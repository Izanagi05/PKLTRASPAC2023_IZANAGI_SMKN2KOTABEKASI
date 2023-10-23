from bs4 import BeautifulSoup
import requests
import sys
from selenium import webdriver
# from helper import loadenvapi
from concurrent.futures import ThreadPoolExecutor
from datetime import datetime
# from database_helper import insert_bulk_data
import validators
import os
import json
from selenium.webdriver.chrome.options import Options


options = Options()
options.headless = True


# loadenvapi()

array_data=[]

if len(sys.argv)<2:
    print("Argumen tidak lengkap")
    # print(datetime.now().strftime("%d %B %Y %H:%M:%S"))
    exit()

limit = os.getenv("LIMIT_ASYNC", 20)
limit = int(limit)
search = sys.argv[1]

url='https://m.brilio.net/search-result/'+search+'/'
browserku=webdriver.Chrome(options=options)
browserku.get(url)
html = browserku.page_source
soup = BeautifulSoup(html, "html.parser")
list_berita= soup.find(class_=  "article-berita")

berita_items=list_berita.find_all("li")
for berita in berita_items:
    judul = berita.find(class_="text-article").a.text.strip()
    urlisi = berita.find("h3").a["href"]
    page2 = requests.get('https://m.brilio.net'+urlisi)
    Soup2 =BeautifulSoup(page2.text, "html.parser")
    parentisi=Soup2.find(class_="main-content")
    isidetail=parentisi.find("p").text.strip()



    array_data.append({

       "judul": judul,
       "isi": isidetail
    }
    )


# judul = list_berita.find(class_= "deskrip-right")
print(array_data)
