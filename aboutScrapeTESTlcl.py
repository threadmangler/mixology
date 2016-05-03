# -*- coding: utf-8 -*-
#import concurrent.futures
#import requests
from urllib import urlopen
from bs4 import BeautifulSoup


recipe = urlopen("floradora.html").read()

soup = BeautifulSoup(recipe)
a_tag = soup.a

#print soup.find("ul", {"class": "ingredients-list"}).findAll("li")
#ingrs = soup.find("ul", {"class": "ingredients-list"}).findAll("li")
#print soup.findAll("li", {"itemprop": "ingredients"})     
# maybe I need to store the above in an array?

for eaching in soup.findAll("li", {"itemprop": "ingredients"}):
    inglist = eaching.findAll('a')
    for a_tag in inglist:
#        print eaching.findAll('a')
        for inside in a_tag:
            ingred = a_tag.contents
            print ingred[0]
#            combo = []
#            for ingred in inside:
#                combo.extend(ingred)
#                print combo
        
        


