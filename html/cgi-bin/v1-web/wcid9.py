from bs4 import BeautifulSoup
from urllib.request import Request, urlopen

req = Request('https://www.frontiersin.org/articles/10.3389/fphar.2019.01480/full', headers={'User-Agent': 'Mozilla/5.0'})
webpage = urlopen(req).read()

soup = BeautifulSoup(webpage, 'lxml')
items = soup.find_all('div', class_="abstract-container")
testfile = open("html/files/a-web/tid9input.txt", "w")
for job_element in items:
    links = job_element.find_all("p")
    for link in links:
        testfile.write(link.text.strip())
testfile.close()  