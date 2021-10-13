from bs4 import BeautifulSoup
from urllib.request import Request, urlopen

req = Request('https://balconygardenweb.com/best-medicinal-plants/#:~:text=Here', headers={'User-Agent': 'Mozilla/5.0'})
webpage = urlopen(req).read()

soup = BeautifulSoup(webpage, 'lxml')
items = soup.find_all('div', class_="wpb_wrapper")
testfile = open("html/files/a-web/tid3input.txt", "w")
for job_element in items:
    links = job_element.find_all("p")
    for link in links:
        testfile.write(link.text.strip())
testfile.close()  