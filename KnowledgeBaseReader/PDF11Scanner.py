from PyPDF2 import PdfFileReader, PdfFileWriter
import slate3k as slate
import re
import os
from dataSplitter import extractData  
import json
import sys
from pdf2jpg import pdf2jpg
from mysql.connector import (connection)

cnx = connection.MySQLConnection(user='root',
                                 host='localhost',
                                 database='name_db')

cur = cnx.cursor()

# load in json file to get textbook format
with open('KnowledgeBaseReader/format6.json') as json_file: 
    pdf_format = json.load(json_file)
    json_file.close()

# create db table from info given in 
table_name = "Medicinal Plant 11"
ddl = ""
for col in pdf_format['columns']:
    ddl += "`{}` text,".format(col)

create_table = ("CREATE TABLE IF NOT EXISTS `{}` ( `ID` INT NOT NULL AUTO_INCREMENT, `Image_Link` TEXT, {} PRIMARY KEY (`ID`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;".format(table_name, ddl))
cur.execute(create_table)
cnx.commit()

# open the PDF file
pdfFile = open('html/files/books/medicinal_plant_11_book.pdf', 'rb')

# create PDFFileReader object to read the file
pdfReader = PdfFileReader(pdfFile)



print("PDF File name: " + str(pdfReader.getDocumentInfo().title))
print("PDF File created by: " + str(pdfReader.getDocumentInfo().creator))
print("- - - - - - - - - - - - - - - - - - - -")

numOfPages = pdfReader.getNumPages()
debug = False
i = pdf_format['startPage']
img_page_diff = pdf_format['pictures']['startPage'] - pdf_format['startPage']
with open ('KnowledgeBaseReader/11_book.txt', mode = "w", encoding = "utf-8") as output_file:
    #does not write anything into text file
    while i < pdf_format['lastPage'] :
        pageObj = pdfReader.getPage(i)
        text = pageObj.extractText()
        output_file.write(text)
        output_file.write("\n")
        dataDict = extractData(text, pdf_format['columns'])
	
        if debug:
            
            """ check for any None value in data Dict
            if yes
                print page text
                loop through all none values and ask to copy paste the identifier or just press enter
                    if string was added then add it to columns dict
                save it to format.json
                reload format.json     
                rerun extractData """
            
            debug_list = []
            print(debug_list)
            for col in dataDict:
                if dataDict[col]==None:
                    debug_list.append(col)
            print(debug_list)
            if len(debug_list)>0:
                print(f"Some columns were not found \The page text will display press `Enter` if string variation is not present\n or \nInput the string variation then press `Enter`")
                print(text)
                for debug_column in debug_list:
                    new_variation=input("Enter variation of %s (make sure its regex safe):\n"%debug_column)
                    if new_variation != '':
                        pdf_format['columns'][debug_column][0]+=f"|%s"%new_variation
                json_file = open(sys.argv[2],"w")
                json.dump(pdf_format,json_file)
                json_file.close()
                dataDict = extractData(text, pdf_format['columns'])


 
        img_num = i+img_page_diff
        image_link = 'html/files/PlantPicsPDF/%s/Plant%s.pdf'%(table_name,img_num)
        
        # Insert statement that is general and should work for all plant textbooks
        placeholders = ', '.join(['%s'] * len(dataDict))
        columns = '`, `'.join(dataDict.keys()) + '`, `Image_link'
        query = "INSERT INTO `%s`( `%s` ) VALUES ( %s , '%s')"%(table_name, columns, placeholders, image_link)
        
        # Create cursor to insert dictionary into the database
        
        cur.execute(query, list(dataDict.values()))
        cnx.commit()
        
        i += 2

#create directory for the images

try:
    os.mkdir(os.path.join(os.path.dirname(os.getcwd()),"html/files/PlantPicsPDF/%s"% table_name))
except OSError:
    print ("Creation of the directory failed" )
else:
    print ("Successfully created the directory " )
    

i = pdf_format['pictures']['startPage']
l = 1
while i < pdf_format['pictures']['lastPage']:  
    pdf_writer = PdfFileWriter()
    pdf_writer.addPage(pdfReader.getPage(i))
    with open (os.path.join(os.path.dirname(os.getcwd()),'html/files/PlantPicsPDF/%s/Plant%s.pdf') % (table_name, i), mode = "ab") as pdfsplit:
        pdf_writer.write(pdfsplit)
    inputpath = os.path.join(os.path.dirname(os.getcwd()),r"html/files/PlantPicsPDF/%s/Plant%s.pdf" % (table_name, i))
    outputpath = os.path.join(os.path.dirname(os.getcwd()),r"html/files/PlantPic/%s"%table_name)
    result = pdf2jpg.convert_pdf2jpg(inputpath, outputpath, dpi = 300,pages="0")
    i += 2