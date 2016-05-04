# -*- coding: utf-8 -*-
import concurrent.futures
import requests
# import urllib2
from bs4 import BeautifulSoup

array = []
with open("urls.txt", "r") as f:
  for line in f:
    array.append(line.strip())
#    print array

#url = "http://cocktails.about.com/od/ginrecipes/r/floradora_cktl.htm"

def scraping_function(url):
    # do stuff from OP's script
    soup = BeautifulSoup(requests.get(url).text)

#print soup.find("ul", {"class": "ingredients-list"}).findAll("li")
#ingrs = soup.find("ul", {"class": "ingredients-list"}).findAll("li")
    print soup.findAll("li", {"itemprop": "ingredients"})     

#for eaching in soup.findAll("li", {"itemprop": "ingredients"}):
#    print eaching.parent.next_sibling.findAll('a')

with concurrent.futures.ThreadPoolExecutor(max_workers=1) as e:
    # go through the url list 20 items at a time
    e.map(scraping_function, array)

