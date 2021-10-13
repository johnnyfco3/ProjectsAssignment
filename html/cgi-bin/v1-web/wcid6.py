from bs4 import BeautifulSoup
from urllib.request import Request, urlopen
from urllink import crawl

req = Request('https://cornellbotanicgardens.org/explore/gardens/medicinal-herbs/', headers={'User-Agent': 'Mozilla/5.0'})
webpage = urlopen(req).read()

soup = BeautifulSoup(webpage, 'lxml')
items = soup.find_all('div', class_="img-wrap")
for job_element in items:
    links = job_element.find_all("a")
    crawl(links.attrs['href']) 