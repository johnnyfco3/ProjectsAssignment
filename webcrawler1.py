import requests
from bs4 import BeautifulSoup


def trade_spider(max_pages):
    page = 1
    while page < max_pages:
        url = '' + str(page)
        source_code = requests.get(url)
        plain_text = source_code.text    
        soup = BeautifulSoup(plain_text)                            #all the text is in this variable
        for link in soup.findAll('a', {'class': 'item-name'}):      #loop all the source code and pick out the links with class item name 
            #href = "first half of url" + link.get('href')          returns the urls
            title = link.string
        page += 1
        
