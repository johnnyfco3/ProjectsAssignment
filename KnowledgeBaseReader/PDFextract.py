
"""
pip install PyPDF2
    -reads pdfs
pip install python-dotenv
    -provides envirmonment vars so nothing is out in the open 
pip install mysql-connector-python
    -connects to the mysqlserver
pip install pdf2jpg
    -changes pdf to jpg

To run:
    python PDFextract.py textbook.pdf format.json
"""
import PyPDF2
import mysql.connector
import re
import os
from dotenv import load_dotenv
from dataSplitter import extractData  
from pdf2jpg import pdf2jpg
import json
import sys
import argparse

#get envir vars
load_dotenv()

#load command line args
parser = argparse.ArgumentParser()
parser.add_argument("pdf",help="the pdf to be used")
parser.add_argument("json",help="JSON file used to input format of the pdf")
parser.add_argument("-d","--debug",
                    help="turns on mode where allows to update json when columns are null",
                    action="store_true")
args = parser.parse_args()

#create db cursor
cnx = mysql.connector.connect(
    host = os.getenv("DB_HOST"),
    user = os.getenv("DB_USER"),
    password = os.getenv("DB_PASSWORD"),
    database = os.getenv("DB_NAME")
)
cur = cnx.cursor()

# load in json file to get textbook format
with open(args.json) as json_file: 
    pdf_format = json.load(json_file)
    json_file.close()

pdfFileObj = open('../html/doc/%s'%(args.pdf), 'rb')
pdfReader = PyPDF2.PdfFileReader(pdfFileObj)

# create db table from info given in 
table_name = args.pdf.strip(".pdf").replace(" ","_")
ddl = ""
for col in pdf_format['columns']:
    ddl += "`{}` text,".format(col)

create_table = ("CREATE TABLE IF NOT EXISTS `{}` ( `ID` INT NOT NULL AUTO_INCREMENT, `Image_Link` TEXT, {} PRIMARY KEY (`ID`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;".format(table_name, ddl))
cur.execute(create_table)
cnx.commit()

#  check for debug flag
debug = False
#Extract all text from PDF and put in text document
i = pdf_format['startPage']
img_page_diff = pdf_format['pictures']['startPage'] - pdf_format['startPage']
with open ('text_check.txt', mode = "w", encoding = "utf-8") as output_file:
    while i < pdf_format['lastPage'] :
        pageObj = pdfReader.getPage(i)
        text = pageObj.extractText()
        output_file.write(text)
        output_file.write("\n")
        dataDict = extractData(text, pdf_format['columns'])
        
        if debug:
            """
            ~check for any None value in data Dict
            if yes
                print page text
                loop through all none values and ask to copy paste the identifier or just press enter
                    if string was added then add it to columns dict
                save it to format.json
                reload format.json     
                rerun extractData 
            """
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

        # creating image link string for the table
        img_num = i+img_page_diff
        image_link = '/files/PlantPicsPDF/%s/Plant%s.pdf'%(table_name,img_num)
        
        # Insert statement that is general and should work for all plant textbooks
        placeholders = ', '.join(['%s'] * len(dataDict))
        columns = '`, `'.join(dataDict.keys()) + '`, `Image_link'
        query = "INSERT INTO `%s`( `%s` ) VALUES ( %s , '%s')"%(table_name, columns, placeholders, image_link)
        
        # Create cursor to insert dictionary into the database
        
        cur.execute(query, list(dataDict.values()))
        cnx.commit()
        
        i += 2

#create directory for the images

path = os.path.join(os.path.dirname(os.getcwd()),"html/files/PlantPicsPDF/%s"% table_name)

try:
    os.mkdir(path)
except OSError:
    print ("Creation of the directory %s failed" % path)
else:
    print ("Successfully created the directory %s " % path)
    

i = pdf_format['pictures']['startPage']
l = 1
while i < pdf_format['pictures']['lastPage']:  
    pdf_writer = PyPDF2.PdfFileWriter()
    pdf_writer.addPage(pdfReader.getPage(i))
    with open (os.path.join(os.path.dirname(os.getcwd()),'html/files/PlantPicsPDF/%s/Plant%s.pdf') % (table_name, i), mode = "ab") as pdfsplit:
        pdf_writer.write(pdfsplit)
    inputpath = os.path.join(os.path.dirname(os.getcwd()),r"html/files/PlantPicsPDF/%s/Plant%s.pdf" % (table_name, i))
    outputpath = os.path.join(os.path.dirname(os.getcwd()),r"html/files/PlantPic/%s"%table_name)
    result = pdf2jpg.convert_pdf2jpg(inputpath, outputpath, dpi = 300,pages="0")
    i += 2
