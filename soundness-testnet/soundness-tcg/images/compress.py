import os
from PIL import Image

for filename in os.listdir('.'):
    if filename.endswith('.png') or filename.endswith('.jpg'):
        img = Image.open(filename)
        
        name_only = os.path.splitext(filename)[0]
        new_filename = f"{name_only}.webp"
        
        img.save(new_filename, 'webp', optimize=True, quality=80)
        print(f"Compressed: {new_filename}")

print("Finish")