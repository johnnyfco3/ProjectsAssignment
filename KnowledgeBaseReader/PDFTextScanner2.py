import fitz  # this is pymupdf

with fitz.open("medicinal_plant_11_book.pdf") as doc:
    text = ""
    for page in doc:
        text += page.get_text()

print(text)