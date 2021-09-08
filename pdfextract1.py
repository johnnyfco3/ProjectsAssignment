from PyPDF2 import PdfFileReader, PdfFileWriter

file_path = "book1-Medicinal plants in Viet Nam.pdf"
pdf = PdfFileReader(file_path)                          #reads in pdf

with open('testPDF.txt', 'w') as f:                     #creates txt file to display output
    for page_num in range(pdf.numPages):
        #print('Page: {0}'.format(page_num))
        pageObj = pdf.getPage(page_num)                 #pageObj has page info

        try: 
            txt = pageObj.extractText()
        except:
            pass
        else:
            f.write('Page {0}\n'.format(page_num+1))
            f.write(txt)
    f.close()           
