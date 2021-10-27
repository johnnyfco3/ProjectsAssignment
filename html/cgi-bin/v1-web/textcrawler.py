from urllib.request import urlopen
from bs4 import BeautifulSoup

url_to_crawl = "http://cs.newpaltz.edu/p/f21-11/v2/webtest/a1.htm"

request_page = urlopen(url_to_crawl)
page_html = request_page.read()
request_page.close()

soup = BeautifulSoup(page_html, 'lxml')
items = soup.find_all('div', class_="buct")
testfile = open("html/files/a-web/testinput.txt", "w")
for job_element in items:
    links = job_element.find_all("p")
    for link in links:
        testfile.write(link.text.strip())
testfile.close() 