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
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time


options = Options()
# options.headless = false
chrome_options = webdriver.ChromeOptions()
chrome_options.headless= False
chrome_options.add_argument("--webdriver-path=path_to_chromedriver")



page = 'http://localhost:5000/user-view/tambah-toko'
browserku=webdriver.Chrome(options=chrome_options)
browserku.get(page)
# webdriverchek = browserku.page_source
# soup = BeautifulSoup(webdriverchek, "html.parser")
# # print(soup)
# exit()
# nama='akubaruuu38'
# email='akubaruuu38@gmail.com'
# password='akubaruuu38uuu'

def register(nama, email, password):
    browserku.implicitly_wait(10) 
    nama_element = browserku.find_element(By.ID, 'input-21')
    email_element = browserku.find_element(By.ID, 'input-24')
    password_element = browserku.find_element(By.ID, 'input-27')
    register_button = browserku.find_element(By.ID, 'buttonregisku')

    # register_button = browserku.find('button',class_='regist-btn')
    # register_button = browserku.find_element(By.CLASS_NAME, 'regist-btn')

    # register_button = browserku.find_element(By.CSS_SELECTOR, 'button.v-btn--is-elevate')

    nama_element.send_keys(nama)
    email_element.send_keys(email)
    password_element.send_keys(password)
    register_button.click()
    time.sleep(6)
def login(email, password):
        
    # nama_element = browserku.find_element('id','input-21')
    # email_element = browserku.find_element('id','input-24')
    # browserku.implicitly_wait(20) 
    # password_element = browserku.find_element('id','input-27')
    # nama_element = browserku.find_element(By.ID, 'input-21')
    try:
        email_element = browserku.find_element(By.ID, 'input-19')
        password_element = browserku.find_element(By.ID, 'input-22')
        # register_button = browserku.find_element(By.ID, 'buttonregisku')

        # register_button = browserku.find('button',class_='regist-btn')
        # login_button = browserku.find_element(By.CLASS_NAME, 'regist-btn')

        login_button = browserku.find_element(By.CSS_SELECTOR, 'button.v-btn--is-elevated')

        # nama='akubaruuu'
        # email='admin@gmail.com'
        # password='admin'
        # nama_element.send_keys(nama)
        email_element.send_keys(email)
        password_element.send_keys(password)
        login_button.click()
        time.sleep(5)
        if 'login' in browserku.current_url:
            print('Password atau email belum sesuai')
            browserku.quit()
            exit()
        else:
            print('Berhasil login') 
    except Exception as e:
        print('Terjadi kesalahan: ', e)

def home():
    a_tag_element = browserku.find_element(By.CSS_SELECTOR, 'a[href*="user-view"]')
    a_tag_element.click()
    time.sleep(5)
def profil():
    sidebar_button = browserku.find_element(By.CLASS_NAME, 'sidebtn-2')
    sidebar_button.click()
    time.sleep(5)
def tambahbarang():
    sidebar_button = browserku.find_element(By.CLASS_NAME, 'sidebtn-3')
    sidebar_button.click()
    time.sleep(5)

    namafield = browserku.find_element(By.ID, 'input-138')
    namafield.send_keys('Barang-1')
    # namafield.click()
    kategorifield_buton = browserku.find_element(By.XPATH, "//button[contains(., 'Masukan Kategori')]")
    kategorifield_buton.click()
    selectoptionkategori=browserku.find_element(By.XPATH, '//*[@aria-owns="list-163"]')
    selectoptionkategori.click()
    pilihankateg=browserku.find_element(By.ID, 'list-item-172-2')
    pilihankateg.click()

    tokofield_button = browserku.find_element(By.XPATH, "//button[contains(., 'Masukan Toko')]")
    tokofield_button.click()
    selectoptiontoko=browserku.find_element(By.XPATH, '//*[@aria-owns="list-178"]')
    selectoptiontoko.click()
    pilihantoko=browserku.find_element(By.ID, 'list-item-187-1')
    pilihantoko.click()

    deskripsifield = browserku.find_element(By.ID, 'input-157')
    deskripsifield.send_keys('ini deskripsi barang-1')

    jual_button = browserku.find_element(By.XPATH, "//button[contains(., 'Jual')]")
    jual_button.click()
    # webdriverchek = browserku.page_source
    # soup = BeautifulSoup(webdriverchek, "html.parser")
    # print(soup)
    time.sleep(5)

def crudtoko():
    nama_button = browserku.find_element(By.XPATH, "//button[contains(., 'Nama')]")
    nama_button.click() 
    namatk_element = browserku.find_element(By.ID, 'input-137')
    namatk_element.send_keys('Toko Ayam goyeng') 

    alamat_button = browserku.find_element(By.XPATH, "//button[contains(., 'Alamat')]")
    alamat_button.click()
    alamattk_element = browserku.find_element(By.ID, 'input-140')
    alamattk_element.send_keys('Bekasi, Jawa Barat') 

    telepon_button = browserku.find_element(By.XPATH, "//button[contains(., 'No.Telp')]")
    telepon_button.click()
    telepontk_element = browserku.find_element(By.ID, 'input-143')
    telepontk_element.send_keys('081290')  

    deskripsi_button = browserku.find_element(By.XPATH, "//button[contains(., 'Deskripsi')]")
    deskripsi_button.click()
    deskripsitk_element = browserku.find_element(By.ID, 'input-146')
    deskripsitk_element.send_keys('Ayam goyeng rasanya enak') 

    buattoko_button = browserku.find_element(By.XPATH, "//button[contains(., 'buat')]")
    buattoko_button.click()
    time.sleep(14)
    # webdriverchek = browserku.page_source
    # soup = BeautifulSoup(webdriverchek, "html.parser")
    # print(soup)
    # print(tes)
def datatoko():
   
    sidebar_button = browserku.find_element(By.CLASS_NAME, 'sidebtn-1')
    sidebar_button.click()
    time.sleep(5)
    detail_barang_button = browserku.find_element(By.XPATH, "(//button[contains(., 'Detail barang')])[2]")
    detail_barang_button.click()
    time.sleep(5)

# register('aku123','akubaruuu123@gmail.com', 'akubaruuu38123')
login('akubaruuu38@gmail.com', 'akubaruuu38123m')
home()
profil()
tambahbarang()
# crudtoko()
# datatoko()
# print(nama_element)

