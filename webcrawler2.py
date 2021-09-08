from urllib.request import urlopen
from bs4 import BeautifulSoup as soup
import re

tom = urlopen("https://en.wikipedia.org/wiki/Tom_Cruise")
bsobj = soup(tom.read())
for link in bsobj.findAll('a'):
    if 'href' in link.attrs:
        print(link.attrs['href'])     #prints all links in wikipedia page