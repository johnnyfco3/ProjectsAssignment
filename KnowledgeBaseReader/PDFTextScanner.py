from PyPDF2 import PdfFileReader
import slate3k as slate

# open the PDF file
pdfFile = open('html/files/books/Medicinal-Plants-of-North-America.pdf', 'rb')

# create PDFFileReader object to read the file
pdfReader = PdfFileReader(pdfFile)



print("PDF File name: " + str(pdfReader.getDocumentInfo().title))
print("PDF File created by: " + str(pdfReader.getDocumentInfo().creator))
print("- - - - - - - - - - - - - - - - - - - -")

numOfPages = pdfReader.getNumPages()

for i in range(0, numOfPages):
	print("Page Number: " + str(i))
	print("- - - - - - - - - - - - - - - - - - - -")
	pageObj = pdfReader.getPage(i)
	print(pageObj.extractText())


 
# with open('medicinal_plant_11_book.pdf','rb') as f:
   # extracted_text = slate.PDF(f)
   # print(extracted_text)

	
# close the PDF file object
pdfFile.close()