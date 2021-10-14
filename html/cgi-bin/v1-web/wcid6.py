from bs4 import BeautifulSoup
from urllib.request import Request, urlopen
from urllink import crawl

req = Request('https://cornellbotanicgardens.org/explore/gardens/medicinal-herbs/', headers={'User-Agent': 'Mozilla/5.0'})
webpage = urlopen(req).read()
testfile = open("html/files/a-web/tid6input.txt", "w")
soup = BeautifulSoup(webpage, 'lxml')
items = soup.find_all('div', class_="img-wrap")
for link in items:
    all_links = link.find_all('a', href=True)
    for l1 in all_links:
        crawl(l1.attrs['href'], testfile)
testfile.close()