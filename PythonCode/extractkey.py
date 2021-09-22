mylines = []                             # Declare an empty list named mylines.
with open ('inputfile.txt', 'rt') as myfile: # Open lorem.txt for reading text data.
    for myline in myfile:                # For each line, stored as myline,
        mylines.append(myline)           # add its contents to mylines.
print(mylines)  


