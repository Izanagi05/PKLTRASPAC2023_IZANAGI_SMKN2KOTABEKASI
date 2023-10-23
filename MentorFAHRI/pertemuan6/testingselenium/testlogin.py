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
options.headless = True
chrome_options = webdriver.ChromeOptions()
# chrome_options.headless = True
# chrome_options = webdriver.ChromeOptions()
chrome_options.add_argument("--webdriver-path=path_to_chromedriver")



page = 'http://localhost:5000/login'
browserku=webdriver.Chrome(options=chrome_options)
browserku.get(page)
webdriverchek = browserku.page_source
soup = BeautifulSoup(webdriverchek, "html.parser")

# soup2 = soup.find('id', class_='__layout')
# print(soup)

# nama_element = browserku.find_element('id','input-21')
# email_element = browserku.find_element('id','input-24')
# browserku.implicitly_wait(20) 
# password_element = browserku.find_element('id','input-27')
# nama_element = browserku.find_element(By.ID, 'input-21')
email_element = browserku.find_element(By.ID, 'input-19')
password_element = browserku.find_element(By.ID, 'input-22')
# register_button = browserku.find_element(By.ID, 'buttonregisku')

# register_button = browserku.find('button',class_='regist-btn')
# login_button = browserku.find_element(By.CLASS_NAME, 'regist-btn')

login_button = browserku.find_element(By.CSS_SELECTOR, 'button.v-btn--is-elevated')

nama='akubaruuu'
email='admin@gmail.com'
password='admin'
# nama_element.send_keys(nama)
email_element.send_keys(email)
password_element.send_keys(password)
login_button.click()
print(email_element)
time.sleep(3)

# paging = soup.find("div", class_="flex gap-5 my-8 items-center justify-center")
# if paging == None:
#     exit()