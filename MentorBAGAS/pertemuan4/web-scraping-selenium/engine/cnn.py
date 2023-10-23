from bs4 import BeautifulSoup
import requests
import sys
import mysql.connector
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

array_data=[]

if len(sys.argv)<2:
    print("Argumen tidak lengkap")
    # print(datetime.now().strftime("%d %B %Y %H:%M:%S"))
    exit()

limit = os.getenv("LIMIT_ASYNC", 6)
limit = int(limit)
search = sys.argv[1]

# limit = os.getenv("LIMIT_ASYNC", 20)
# limit = int(limit)
# length =len(page) - 1

page = 'https://www.cnnindonesia.com/search/?query='+search
browserku=webdriver.Chrome(options=options)
browserku.get(page)
webdriverchek = browserku.page_source
soup = BeautifulSoup(webdriverchek, "html.parser")
paging = soup.find("div", class_="flex gap-5 my-8 items-center justify-center")
if paging == None:
    exit()
    # print("gagal")

pagination_container =  paging.find_all("a", attrs={"dtr-evt": "halaman"})
# if pagination_container == None:
#     exit()
pagination_links = [f"https://www.cnnindonesia.com{link['href']}" for link in pagination_container]

lengthpaging=len(pagination_links)
# loadenvapi()
# hrefpag=[]
# for link in pagination_container[:4]:
#     hrefpag.append('https://www.cnnindonesia.com/'+link.get("href"))

# print(ambilapaging  )
# exit()
array_datacnn=[]
def ambildata(halaman):
    angka=str(halaman)
    print(angka)
    url='https://www.cnnindonesia.com/search/?query='+search+'&page='+angka
    browserku=webdriver.Chrome(options=options)
    browserku.get(url)
    html = browserku.page_source
    soup = BeautifulSoup(html, "html.parser")
    list_berita= soup.find("div", query=search)
    articles= list_berita.find_all("article")
    detail_data = None
    for i, list in enumerate(articles):
        if list.a != None:
            spanjudul=list.a
            urldetail=list.a['href']
            detailreq = requests.get(urldetail)
            soup2 =BeautifulSoup(detailreq.text, "html.parser")
            parentisi=soup2.find(class_="detail-text")
            if (parentisi) != None:
                caripdetail = str(parentisi.get_text(strip=True))
        else :
            caripdetail = "Tidak Ditemukan"
            # caripdetail=parentisi.find_all("p")
        detail_data=[]
        # for i, list in enumerate(caripdetail):
        #     if list.text != None:
        #         ambilptext=list.text.strip()
        #     # if ambildata != None:
        #         detail_data.append(ambilptext)
        # print(caripdetail)


        # judul_items = spanjudul.find_all("span", class_="boxflex-grow_text")
        # for judul_item in judul_items:
        #     judul = judul_item
        judul_item = spanjudul.find("h2", class_="text-cnn_black_light")
        # if judul_item:
        judul = judul_item.text.strip()
        isi=caripdetail
        dibuatpada=datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        array_datacnn.append(
            [
                (
                    judul,
                    isi,
                    dibuatpada
                )
            ]
        )
    # print(array_datacnn)
    # exit()

    query = (
            "INSERT INTO beritascarpings" + "(judul, isi, dibuatpada) VALUES (%s, %s, %s)"
    )
    insert_data(query, array_datacnn)


# number_thread = 6
# number_thread = int(number_thread)
# pool = ThreadPoolExecutor(max_workers=number_thread)
# for x in range(1, (int(length)+1)):
#     if x > limit:
#         break
#     pool.submit(ambildata, str(x))
# pool.shutdown(wait=True)
# for j in range(1, 6):
# ambildata(1)
def insert_data(query, array_datacnn):
    try:
        connection = mysql.connector.connect(
            database="web-scraping",
            user="root",
            password="",
            host="localhost",
            port="3306"
        )
        # print(array_datacnn)
        # exit()
        cursor=connection.cursor()
        for dtbrt in array_datacnn:
            for datatbl in dtbrt:
                judul, isi, dibuatpada = datatbl
                values= (judul, isi, dibuatpada)
                print(values)
                cursor.execute(query, values)

        connection.commit()
        count = cursor.rowcount
        print(count, "Data berhasil disimpan")
        if connection:
            cursor.close()
            connection.close()
        print(count, "Mysql di matikan")
    except (Exception, mysql.connector.Error) as error:
        print("Gagal menyimpan data", error)


number_thread = 6
number_thread = int(number_thread)
pool = ThreadPoolExecutor(max_workers=number_thread)
for x in range(1, (int(lengthpaging)+1)):
    if x > limit:
        break
    pool.submit(ambildata, str(x))
pool.shutdown(wait=True)

# def crawling_data(array_datacnn):
#     query= {
#         "INSERT INTO beritascarpings"+ "(judul, isi, dibuatpada) VALUES (%s, %s, %s)"
#     }
#     insert_data(query, array_datacnn)



