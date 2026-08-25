import re

with open('wp-content/plugins/chitramaya-proofing/assets/css/proofing.css', 'r') as f:
    css = f.read()

# 1. Header Title
css = re.sub(r'(\.header-title\s*\{\s*.*?)(white-space:\s*nowrap;)', r'\1display: none;\n\t\2', css, flags=re.DOTALL)

# 2. Culler Container
css = re.sub(r'(\.culler-container\s*\{\s*display:\s*flex;\n)\s*flex:\s*1;', r'\1\tflex-direction: column;\n\tflex: 1;', css)

# 3. Stage left
css = re.sub(r'(\.stage-left\s*\{\s*flex:\s*1;)', r'\1\n\tmin-height: 40vh;', css)

# 4. Stage image area
css = re.sub(r'(\.stage-image-area\s*\{\s*flex:\s*1;)', r'\1\n\ttouch-action: pan-y;', css)

# 5. Stage nav btn
css = re.sub(r'(\.stage-nav-btn\s*\{.*?)(opacity:\s*0;)', r'\1display: none;\n\t\2', css, flags=re.DOTALL)

# 6. Filmstrip height
css = re.sub(r'(\.filmstrip\s*\{\s*)height:\s*72px;', r'\1height: 64px;', css)
css = re.sub(r'(\.filmstrip-thumb\s*\{\s*flex-shrink:\s*0;\n\s*)width:\s*54px;\n\s*height:\s*54px;', r'\1width: 48px;\n\theight: 48px;', css)

# 7. Panel Right
css = re.sub(r'\.panel-right\s*\{\s*width:\s*280px;\s*flex-shrink:\s*0;\s*background:\s*var\(--surface\);\s*border-left:\s*1px solid var\(--border\);\s*display:\s*flex;\s*flex-direction:\s*column;\s*padding:\s*20px 18px;\s*gap:\s*18px;\s*overflow-y:\s*auto;\s*\}', 
    '.panel-right {\n\twidth: 100%;\n\tflex-shrink: 0;\n\tbackground: var(--surface);\n\tborder-top: 1px solid var(--border);\n\tdisplay: flex;\n\tflex-direction: column;\n\tpadding: 15px;\n\tgap: 15px;\n\toverflow-y: auto;\n\tmax-height: 45vh;\n}', css)

# 8. Action Cards
css = re.sub(r'\.action-cards\s*\{\s*display:\s*flex;\s*flex-direction:\s*column;\s*gap:\s*10px;\s*\}', 
    '.action-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }', css)

# 9. Hide hints
css = re.sub(r'(\.action-key\s*\{)', r'\1\n\tdisplay: none;', css)
css = re.sub(r'(\.hotkey-legend\s*\{)', r'\1\n\tdisplay: none;', css)
css = re.sub(r'(\.progress-label\s*\{)', r'\1\n\tdisplay: none;', css)

# 10. Grid Container
css = re.sub(r'\.grid-container\s*\{\s*flex:\s*1;\s*overflow-y:\s*auto;\s*padding:\s*20px 20px 40px;\s*columns:\s*4;\s*column-gap:\s*10px;\s*\}',
    '.grid-container {\n\tflex: 1;\n\toverflow-y: auto;\n\tpadding: 10px;\n\tcolumns: 2;\n\tcolumn-gap: 8px;\n}', css)
css = re.sub(r'@media\s*\(max-width:\s*1400px\)\s*\{\s*\.grid-container\s*\{\s*columns:\s*3;\s*\}\s*\}\n@media\s*\(max-width:\s*900px\)\s*\{\s*\.grid-container\s*\{\s*columns:\s*2;\s*\}\s*\}',
    '', css)
css = re.sub(r'(\.grid-item\s*\{\s*break-inside:\s*avoid;\n\s*)margin-bottom:\s*10px;', r'\1margin-bottom: 8px;', css)

# Now, add the desktop media query at the end
desktop_css = """
/* =====================================================
   DESKTOP RESPONSIVENESS (Min 768px)
   ===================================================== */
@media (min-width: 768px) {
	.header-title { display: block; }
	.progress-label { display: block; }
	
	.culler-container { flex-direction: row; }
	.stage-left { min-height: auto; }
	.stage-image-area { touch-action: auto; }
	.stage-nav-btn { display: flex; }
	
	.panel-right {
		width: 280px;
		border-top: none;
		border-left: 1px solid var(--border);
		padding: 20px 18px;
		max-height: none;
	}
	
	.action-cards {
		display: flex;
		flex-direction: column;
	}
	
	.action-key { display: inline-block; }
	.hotkey-legend { display: block; }
	
	.filmstrip { height: 72px; }
	.filmstrip-thumb { width: 54px; height: 54px; }
	
	.grid-container {
		columns: 3;
		padding: 20px 20px 40px;
		column-gap: 10px;
	}
	.grid-item { margin-bottom: 10px; }
}

@media (min-width: 1400px) {
	.grid-container { columns: 4; }
}
"""

css += desktop_css

with open('wp-content/plugins/chitramaya-proofing/assets/css/proofing.css', 'w') as f:
    f.write(css)
