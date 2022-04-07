import requests
import mysql.connector 
from mysql.connector import Error
import pandas as pd
from MyApiKey import get_api_key

key = get_api_key()
url = 'https://api.yelp.com/v3/businesses/search'

parameters = {'location': '610 Newyork Rd, Glassboro, NJ',
             'term': 'Food',
             'radius': 6000,
             'limit': 6}

response = requests.get(url, headers=headers, params=parameters)

def queryToDf(query):
    results = {'Name': [],'Rating': [],'Pricing': [],'Reviews': []}
    for q in query:
        results['Name'].append(q['name'])
        results['Rating'].append(q['rating'])
        try:
            results['Pricing'].append(len(q['price']))
        except:
            results['Pricing'].append(None)
        results['Reviews'].append(q['review_count'])
    return pd.DataFrame(results)
  
  df = queryToDf(response.json()['businesses'])
  
connection = mysql.connector.connect(
    host="sql5.freemysqlhosting.net",
    user="sql5476262", 
    password="ubHt8arqDy",
    database="sql5476262"
    )

mycursor = connection.cursor()

cols = "`,`".join([str(i) for i in df.dropna().columns.tolist()])

for i,row in df.dropna().iterrows():
    sql = "INSERT INTO `restaurants` (`" +cols + "`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
    mycursor.execute(sql, tuple(row))
    connection.commit()
    
