from bs4 import BeautifulSoup
from urllib.request import Request, urlopen

def crawl(input):
    req1 = Request(input, headers={'User-Agent': 'Mozilla/5.0'})
    webpage1 = urlopen(req1).read()

    soup1 = BeautifulSoup(webpage1, 'lxml')
    items = soup1.find_all('div', class_="holder")
    testfile = open("html/files/a-web/tid6input.txt", "w")
    for job_element in items:
        links = job_element.find_all("p")
        for link in links:
            testfile.write(link.text.strip())
    testfile.close()