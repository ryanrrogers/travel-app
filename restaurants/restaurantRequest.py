import requests
import mysql.connector
import json
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

cityName = mycursor.fetchall()
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

def obtainQuery(location,term,radius,limit):
    parameters = {"location": location,
                  "term": term,
                  "radius": radius,
                  "limit": limit}

df = queryToDf(response.json()['businesses'])
    

    response = requests.get(url, headers=headers, params=parameters)
    json_data = response.json()

    i = 0

    while i < limit:
        name = (json_data["data"]["body"]["searchResults"]["results"][i]["name"])
        rating = (json_data["data"]["body"]["searchResults"]["results"][i]["rating"])
        pricing = (json_data["data"]["body"]["searchResults"]["results"][i]["pricing"])
        reviews = (json_data["data"]["body"]["searchResults"]["results"][i]["reviews"])
        val = (name, rating, pricing, reviews, location)
        i += 1
        connect_to_db(val)

id, cityName = getLocation()

def connect_to_db(val):
    try:
        db = mysql.connector.connect(
            host = "sql5.freemysqlhosting.net",
            user = "sql5476262",
            password = "ubHt8arqDy"
        )

        mycursor = db.cursor()

        sql = "INSERT INTO sql5476262.restaurants(Name,Rating,Pricing,Reviews,location) VALUES (%s, %s, %s, %s, %s)"

        mycursor.execute(sql, val)
        db.commit()

    except Error as e:
        print(e.msg)

    close_db(db)

def close_db(db):
    db.close()

obtainQuery(id, term, radius, limit)

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
