from urllib.request import urlopen
from bs4 import BeautifulSoup

url_to_crawl = "https://en.wikipedia.org/wiki/Tom_Cruise"

request_page = urlopen(url_to_crawl)
page_html = request_page.read()
request_page.close()

soup = BeautifulSoup(page_html, 'lxml')
items = soup.find_all('div', class_="mw-parser-output")
testfile = open("inputfile.txt", "w")
for job_element in items:
    # -- snip --
    links = job_element.find_all("p")
    for link in links:
        testfile.write(link.text.strip())
testfile.close()   
