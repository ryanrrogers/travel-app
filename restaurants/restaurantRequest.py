import requests
import mysql.connector
import json
import re
from mysql.connector import Error
import pandas as pd
from GetLocation import getLocation
from MyRestaurantApiKey import get_restaurant_api_key

key = 'e0be4b2e6cmshf0bef987d2830e8p1c807bjsncc0a19294066'
url = 'https://api.yelp.com/v3/businesses/search'
headers = {
    'Authorization': 'Bearer %s' % key
}

connection = mysql.connector.connect(
    host="sql5.freemysqlhosting.net",
    user="sql5476262",
    password="ubHt8arqDy",
    database="sql5476262"
    )

mycursor = connection.cursor()

mycursor.execute("SELECT arrivalCity FROM TempPerms ORDER BY primKey DESC LIMIT 1")

cityNamez = mycursor.fetchall()
cityName = re.sub("[^a-zA-Z0-9]+", "",str(cityNamez))

response = requests.get(url, headers=headers, params=parameters)

parameters = {'location': cityName,
             'term': 'Food',
             'radius': 5000,
             'limit': 5}

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


    cols = "`,`".join([str(i) for i in df.dropna().columns.tolist()])

    for i,row in df.dropna().iterrows():
        sql = "INSERT INTO `restaurants` (`" +cols + "`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
        mycursor.execute(sql, tuple(row))
        connection.commit()


    connection.commit()
