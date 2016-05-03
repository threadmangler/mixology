# -*- coding: utf-8 -*-
#import concurrent.futures
import requests
# import urllib2
from bs4 import BeautifulSoup


url = "http://cocktails.about.com/od/ginrecipes/r/floradora_cktl.htm"

soup = BeautifulSoup(requests.get(url).text)

#print soup.find("ul", {"class": "ingredients-list"}).findAll("li")
#ingrs = soup.find("ul", {"class": "ingredients-list"}).findAll("li")
print soup.findAll("li", {"itemprop": "ingredients"})     
# maybe I need to store the above in an array?

#for eaching in soup.findAll("li", {"itemprop": "ingredients"}):
#    print eaching.parent.next_sibling.findAll('a')


