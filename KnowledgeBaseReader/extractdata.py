from PyPDF2 import PdfFileReader, PdfFileWriter

pdf = PdfFileReader('KnowledgeBaseReader/Medicinal_Plants_of_North_America.pdf')

with open('KnowledgeBaseReader/Medicinal-Plant-America.txt', 'w') as f:
    for page_num in range(pdf.numPages):
        pageObj = pdf.getPage(page_num)

        try:
            txt = pageObj.extractText()
        except:
            pass
        else:
            f.write(txt)
    f.close()
    