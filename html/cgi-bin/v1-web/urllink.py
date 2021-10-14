from bs4 import BeautifulSoup
from urllib.request import Request, urlopen

def crawl(input, file):
    req = Request(input, headers={'User-Agent': 'Mozilla/5.0'})
    webpage = urlopen(req).read()

    soup = BeautifulSoup(webpage, 'lxml')
    items = soup.find_all('section', class_="section-content")
    for job_element in items:
        links = job_element.find_all('p')
        for link in links:
            file.write(link.text.strip())