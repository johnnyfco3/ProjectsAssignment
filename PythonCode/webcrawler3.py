from urllib.request import urlopen
from bs4 import BeautifulSoup

url_to_crawl = "";

request_page = urlopen(url_to_crawl)
page_html = request_page.read()
request_page.close()

soup = BeautifulSoup(page_html, 'html_parser')
items = soup.find_all('div', class_="content")
for items in items:
    title = items.find('div', class_ ="content-title")          #finds first instance of this

