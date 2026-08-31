import re

with open('chitramaya/assets/css/base/critical.css', 'r') as f:
    content = f.read()

# We want to keep Lato, Roboto Slab, Noto Sans Tamil.
# We will match blocks of @font-face and remove them if they don't contain approved fonts.

approved_fonts = ['Lato', 'Roboto Slab', 'Noto Sans Tamil']

def font_replacer(match):
    block = match.group(0)
    # Check if any approved font is in this block
    for font in approved_fonts:
        if f"font-family: '{font}'" in block:
            return block
    return ""

# Match @font-face { ... } including preceding comments like /* cyrillic */
content = re.sub(r'(/\*.*?\*/\s*)?@font-face\s*\{[^}]*\}', font_replacer, content)

with open('chitramaya/assets/css/base/critical.css', 'w') as f:
    f.write(content)
