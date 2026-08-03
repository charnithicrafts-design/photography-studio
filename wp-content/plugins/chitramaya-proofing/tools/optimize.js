import fs from 'fs/promises';
import path from 'path';
import process from 'process';
import sharp from 'sharp';
import crypto from 'crypto';

const COLORS = {
  reset: '\x1b[0m',
  red: '\x1b[31m',
  green: '\x1b[32m',
  yellow: '\x1b[33m',
  cyan: '\x1b[36m'
};

function printHelp() {
  console.log(`${COLORS.cyan}Chithramaya Photo Proofing - Local Image Optimizer${COLORS.reset}`);
  console.log(`\nUsage: node optimize.js <source_dir> [options]\n`);
  console.log(`Options:`);
  console.log(`  --output <dir>       Output directory (default: ./output)`);
  console.log(`  --quality <num>      WebP quality (0-100, default: 90)`);
  console.log(`  --max-width <num>    Max width for proofing image (default: 2048)`);
  console.log(`  --thumb-width <num>  Width for thumbnail image (default: 400)`);
  console.log(`  --concurrency <num>  Number of concurrent processes (default: 4)`);
  console.log(`  --help               Show this help message`);
}

function parseArgs() {
  const args = process.argv.slice(2);
  if (args.length === 0 || args.includes('--help')) {
    printHelp();
    process.exit(0);
  }

  const options = {
    sourceDir: null,
    outputDir: './output',
    quality: 90,
    maxWidth: 2048,
    thumbWidth: 400,
    concurrency: 4
  };

  for (let i = 0; i < args.length; i++) {
    const arg = args[i];
    if (arg.startsWith('--')) {
      const key = arg.slice(2);
      if (['output', 'quality', 'max-width', 'thumb-width', 'concurrency'].includes(key)) {
        if (i + 1 < args.length) {
          const val = args[i + 1];
          if (key === 'output') options.outputDir = val;
          else if (key === 'max-width') options.maxWidth = parseInt(val, 10);
          else if (key === 'thumb-width') options.thumbWidth = parseInt(val, 10);
          else options[key] = parseInt(val, 10);
          i++;
        }
      }
    } else if (!options.sourceDir) {
      options.sourceDir = arg;
    }
  }

  if (!options.sourceDir) {
    console.error(`${COLORS.red}Error: Source directory is required.${COLORS.reset}`);
    printHelp();
    process.exit(1);
  }

  return options;
}

const SUPPORTED_EXTS = ['.jpg', '.jpeg', '.png', '.tiff', '.tif', '.webp', '.heic', '.heif'];
const RAW_EXTS = ['.cr2', '.nef', '.arw'];

async function scanDirectory(dir) {
  const files = [];
  try {
    const entries = await fs.readdir(dir, { withFileTypes: true });
    for (const entry of entries) {
      const fullPath = path.join(dir, entry.name);
      if (entry.isDirectory()) {
        files.push(...await scanDirectory(fullPath));
      } else if (entry.isFile()) {
        const ext = path.extname(entry.name).toLowerCase();
        if (SUPPORTED_EXTS.includes(ext) || RAW_EXTS.includes(ext)) {
          files.push(fullPath);
        }
      }
    }
  } catch (err) {
    console.error(`${COLORS.red}Error reading directory ${dir}: ${err.message}${COLORS.reset}`);
  }
  return files;
}

function formatBytes(bytes) {
  if (bytes === 0) return '0 B';
  const k = 1024;
  const sizes = ['B', 'KB', 'MB', 'GB'];
  const i = Math.floor(Math.log(bytes) / Math.log(k));
  return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
}

async function processImage(file, options, manifest, stats, progress) {
  const ext = path.extname(file).toLowerCase();
  const filename = path.basename(file);
  const stem = path.basename(file, ext);
  
  if (RAW_EXTS.includes(ext)) {
    process.stdout.clearLine(0);
    process.stdout.cursorTo(0);
    console.log(`${COLORS.yellow}Warning: Skipping RAW file ${filename}. Please export as JPEG/TIFF from Lightroom first.${COLORS.reset}`);
    return;
  }

  const proofingPath = path.join(options.outputDir, 'proofing', `${stem}.webp`);
  const thumbPath = path.join(options.outputDir, 'thumbs', `${stem}.webp`);

  try {
    const fileStats = await fs.stat(file);
    const originalSize = fileStats.size;
    stats.totalInputSize += originalSize;

    const image = sharp(file);
    const metadata = await image.metadata();

    // Generate proofing
    await image
      .clone()
      .resize({ width: options.maxWidth, withoutEnlargement: true })
      .webp({ quality: options.quality })
      .toFile(proofingPath);

    // Generate thumb
    await image
      .clone()
      .resize({ width: options.thumbWidth, withoutEnlargement: true })
      .webp({ quality: 80 })
      .toFile(thumbPath);

    const proofingStats = await fs.stat(proofingPath);
    const thumbStats = await fs.stat(thumbPath);
    
    stats.totalOutputSize += proofingStats.size + thumbStats.size;

    manifest.push({
      id: crypto.randomUUID(),
      filename: `${stem}.webp`,
      original_name: filename,
      original_size_bytes: originalSize,
      proofing_size_bytes: proofingStats.size,
      thumb_size_bytes: thumbStats.size,
      width: metadata.width,
      height: metadata.height
    });

    progress.completed++;
    updateProgress(progress, filename, originalSize, proofingStats.size + thumbStats.size);
  } catch (err) {
    process.stdout.clearLine(0);
    process.stdout.cursorTo(0);
    console.log(`${COLORS.red}Error processing ${filename}: ${err.message}${COLORS.reset}`);
  }
}

function updateProgress(progress, filename, inputSize, outputSize) {
  const percent = Math.round((progress.completed / progress.total) * 100);
  const barLen = 20;
  const filled = Math.round((percent / 100) * barLen);
  const bar = '█'.repeat(filled) + '░'.repeat(barLen - filled);
  
  const savedPercent = Math.round((1 - (outputSize / inputSize)) * 100);
  
  process.stdout.clearLine(0);
  process.stdout.cursorTo(0);
  process.stdout.write(`[${COLORS.green}${bar}${COLORS.reset}] ${progress.completed}/${progress.total} (${percent}%) — ${COLORS.cyan}${filename}${COLORS.reset} — ${formatBytes(inputSize)} → ${formatBytes(outputSize)} (${savedPercent}% saved)`);
}

async function main() {
  const options = parseArgs();
  
  console.log(`${COLORS.cyan}Scanning ${options.sourceDir}...${COLORS.reset}`);
  const files = await scanDirectory(options.sourceDir);
  
  if (files.length === 0) {
    console.log(`${COLORS.yellow}No supported images found in source directory.${COLORS.reset}`);
    return;
  }
  
  console.log(`${COLORS.green}Found ${files.length} images to process.${COLORS.reset}`);

  // Create output directories
  const proofingDir = path.join(options.outputDir, 'proofing');
  const thumbsDir = path.join(options.outputDir, 'thumbs');
  
  await fs.mkdir(proofingDir, { recursive: true });
  await fs.mkdir(thumbsDir, { recursive: true });
  
  const manifest = [];
  const stats = { totalInputSize: 0, totalOutputSize: 0, startTime: Date.now() };
  const progress = { completed: 0, total: files.length };

  // Adjust total for raw files that will be skipped
  progress.total = files.filter(f => !RAW_EXTS.includes(path.extname(f).toLowerCase())).length;

  // Concurrency queue
  let i = 0;
  const workers = Array(options.concurrency).fill(null).map(async () => {
    while (i < files.length) {
      const file = files[i++];
      await processImage(file, options, manifest, stats, progress);
    }
  });

  await Promise.all(workers);
  
  // Clear the progress bar line
  process.stdout.clearLine(0);
  process.stdout.cursorTo(0);
  
  // Write manifest
  await fs.writeFile(
    path.join(options.outputDir, 'manifest.json'),
    JSON.stringify(manifest, null, 2)
  );

  console.log(`\n${COLORS.cyan}=== Optimization Complete ===${COLORS.reset}`);
  console.log(`Images processed: ${manifest.length}`);
  console.log(`Original size:    ${formatBytes(stats.totalInputSize)}`);
  console.log(`Optimized size:   ${formatBytes(stats.totalOutputSize)}`);
  
  if (stats.totalInputSize > 0) {
    const ratio = Math.round((1 - (stats.totalOutputSize / stats.totalInputSize)) * 100);
    console.log(`Space saved:      ${COLORS.green}${ratio}%${COLORS.reset}`);
  }
  
  const elapsed = ((Date.now() - stats.startTime) / 1000).toFixed(1);
  console.log(`Time elapsed:     ${elapsed}s`);
  console.log(`${COLORS.cyan}=============================${COLORS.reset}`);
}

main().catch(err => {
  console.error(`\n${COLORS.red}Fatal Error: ${err.message}${COLORS.reset}`);
  process.exit(1);
});
