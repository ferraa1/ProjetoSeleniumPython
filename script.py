from selenium import webdriver
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.by import By
import mysql.connector
import datetime
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="selenium"
)

print(mydb)

mycursor = mydb.cursor()
insertSQL = "INSERT INTO items (nome, valor, variacao, min, max, data) VALUES (%s, %s, %s, %s, %s, %s)"
updateSQL = "UPDATE items SET valor = %s, variacao = %s, min = %s, max = %s, data = %s WHERE id = %s"

consulta = "SELECT * FROM items where nome = %s"

def algo(tabela):
  lista = tabela.find_element(By.TAG_NAME, "tbody")
  rows = lista.find_elements(By.TAG_NAME, 'tr')
  for row in rows:
    columns = row.find_elements(By.TAG_NAME, 'td')
    name = (columns[0].text)
    valor = (columns[1].text).replace(',', '.')
    variacao = (columns[2].text).replace(',', '.')
    minimo = (columns[3].text).replace(',', '.')
    maximo = (columns[4].text).replace(',', '.')
    ultima = (columns[5].text)

    mycursor.execute(consulta, (name,)) 
    record = mycursor.fetchone()
    print(row)
    print(name)
    if record:
      print('Update')
      val = (valor, variacao, minimo, maximo, ultima, record[0])
      mycursor.execute(updateSQL, val)
    else:
      print('Insert')
      val = (name, valor, variacao, minimo, maximo, ultima)
      mycursor.execute(insertSQL, val)

    
    mydb.commit()

options = Options()
options.binary_location = r"C:/Program Files/Mozilla Firefox/firefox.exe"
driver = webdriver.Firefox(options=options, executable_path="C:/geckodriver/geckodriver.exe")
driver.get('https://www.infomoney.com.br/cotacoes/b3/indice/ibovespa/')
"""
browser = webdriver.Firefox()

browser.get('https://www.infomoney.com.br/cotacoes/b3/indice/ibovespa/')
"""
tabelaAlta = driver.find_element(By.XPATH, "//table[@id='high']")
tabelaBaixa = driver.find_element(By.XPATH, "//table[@id='low']")
algo(tabelaAlta)
print('neg')
#but = driver.find_element(By.XPATH, "//button[@id='low']")
driver.execute_script('document.querySelector("table#low").style.display = "block"')
#but.click()
tabelaBaixa = driver.find_element(By.XPATH, "//table[@id='low']")

algo(tabelaBaixa)
print('ads')
#driver.close()
driver.get('http://127.0.0.1:8000/item')



























""" 
wait = WebDriverWait(browser, 10)
wait.until(ec.visibility_of_element_located((By.XPATH, ".//a[contains(., 'DESENVOLVIMENTO WEB')]")))
browser.find_element(By.XPATH, ".//a[contains(., 'DESENVOLVIMENTO WEB')]").click() """
