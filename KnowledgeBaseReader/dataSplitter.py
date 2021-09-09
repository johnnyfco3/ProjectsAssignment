import re

def extractData(text_data, column_dict):
    #dict thant contains column name and all possible way it show up in the text
    data_dict = dict()
    # split pdf checking for the last possible column first
    for i in column_dict:
        if column_dict[i][1] == "split":
            if re.search(column_dict[i][0],text_data) != None:
                tempSplit = re.split(column_dict[i][0],text_data)
                data_dict[i]=tempSplit[1].lstrip("s: ")
                text_data = tempSplit[0]
            else:
                data_dict[i] = None
        elif column_dict[i][1] == "search":
            tempSearch = re.search(column_dict[i][0], text_data)
            if tempSearch != None:
                data_dict[i]= tempSearch.group(0)
            else:
                data_dict[i]= None
        else:
            print("Columns section of format file given in wrong form please adhere to the following: \n 'column':['regex','split OR search']")
            data_dict[i]=None
            #error handling would go here
    return data_dict