import { decode as decodeJpeg } from '@jsquash/jpeg';
import { decode as decodePng } from '@jsquash/png';
import resize from '@jsquash/resize';
import { encode as encodeWebp } from '@jsquash/webp';

// The plugin's URL where the WASM files will be located
const pluginJsUrl = '/wp-content/plugins/chitramaya-proofing/assets/js/dist/';

// Configure jsquash to fetch wasm from the correct dist directory
// However, jsquash internally uses import.meta.url for fetching. 
// Since we are building an IIFE with vite, import.meta.url might be undefined.
// If it fails, we will need to inject the wasm manually.
// For now, let's see if Vite handles it by rewriting the URLs.

window.jsquashCompress = async function(file, onProgress) {
    const arrayBuffer = await file.arrayBuffer();
    let imageData;
    
    if (onProgress) onProgress('Decoding...');

    try {
        if (file.type === 'image/jpeg' || file.type === 'image/jpg') {
            imageData = await decodeJpeg(arrayBuffer);
        } else if (file.type === 'image/png') {
            imageData = await decodePng(arrayBuffer);
        } else {
            throw new Error('Unsupported image format for WASM compression');
        }
    } catch (e) {
        throw new Error('Decoding failed: ' + e.message);
    }
    
    if (onProgress) onProgress('Resizing for 4K...');
    
    const MAX_DIMENSION = 2500;
    let newWidth = imageData.width;
    let newHeight = imageData.height;

    if (newWidth > MAX_DIMENSION || newHeight > MAX_DIMENSION) {
        const ratio = Math.min(MAX_DIMENSION / newWidth, MAX_DIMENSION / newHeight);
        newWidth = Math.round(newWidth * ratio);
        newHeight = Math.round(newHeight * ratio);
        
        imageData = await resize(imageData, { width: newWidth, height: newHeight });
    }


    
    if (onProgress) onProgress('Encoding WebP...');
    
    // Use the specific options requested by the user for max quality at 1.5MB
    const webpBuffer = await encodeWebp(imageData, {
        target_size: 1500000, // strictly keep under 1.5 MB
        image_hint: 2,        // photography optimization
        use_sharp_yuv: 1,     // sharper RGB-to-YUV conversion
        method: 6,            // max effort (0-6)
        sns_strength: 100     // requested high sns strength
    });
    
    return new Blob([webpBuffer], { type: 'image/webp' });
};
