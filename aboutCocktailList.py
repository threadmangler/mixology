import requests
from bs4 import BeautifulSoup

url = "http://cocktails.about.com/od/outonthetown/ss/bartend_memory.htm#step2"

soup = BeautifulSoup(requests.get(url).text)
strong_tag = soup.strong

for eachstrong in soup.findAll('strong'):
    stronglist = eachstrong.parent.next_sibling.findAll('a')
    for strong_tag in stronglist:
        link = strong_tag.get('href')
        print(link)



#headline = strong_tag.parent
#linklist = headline.next_sibling
    
#for link in linklist.findAll("a"):
#    print(link.get('href'))

# soup.find_all('strong')

