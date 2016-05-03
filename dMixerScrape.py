# -*- coding: utf-8 -*-
import concurrent.futures
import requests
# import urllib2
from bs4 import BeautifulSoup

array = []
with open("dMixerUrls.txt", "r") as f:
  for line in f:
    array.append(line)
# print array

def scraping_function(url):
     # do stuff from OP's script
    soup = BeautifulSoup(requests.get(url).text)

    print soup.find("div", {"class": "ingredients"}).findAll("a")    

with concurrent.futures.ThreadPoolExecutor(max_workers=1) as e:
    # go through the url list 20 items at a time
    e.map(scraping_function, array)

