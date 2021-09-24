from urllib.request import urlopen
from bs4 import BeautifulSoup

url_to_crawl = "https://www.urmc.rochester.edu/encyclopedia/content.aspx?contenttypeid=1&contentid=1169"

request_page = urlopen(url_to_crawl)
page_html = request_page.read()
request_page.close()

soup = BeautifulSoup(page_html, 'lxml')
items = soup.find_all('div', class_="buct")
testfile = open("inputfile.txt", "w")
for job_element in items:
    links = job_element.find_all("p")
    for link in links:
        testfile.write(link.text.strip())
testfile.close()   




