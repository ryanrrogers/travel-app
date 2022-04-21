import requests
from xmlrpc.client import Server
import mysql.connector
from mysql.connector import Error
import json
from GetCityID import getLocation
from MyApiKey import get_api_key


key = get_api_key()
url = "https://hotels4.p.rapidapi.com/properties/list"

sortBy = "STAR_RATING"
pageSize = 5
minPrice = "200"
maxPrice = "500"
cityName = "new york"

# format date on input

def obtainQuery(cityID, minPrice, maxPrice, sortBy):
    querystring = {"destinationId": cityID,
                    "pageNumber":"1",
                    "pageSize":pageSize,
                    "checkIn":"2020-01-08",
                    "checkOut":"2020-01-15",
                    "adults1":"1",
                    "priceMin":minPrice,
                    "priceMax":maxPrice,
                    "sortOrder": sortBy,
                    "locale":"en_US",
                    "currency":"USD"}

    headers = {
        'x-rapidapi-host': "hotels4.p.rapidapi.com",
        'x-rapidapi-key': key
        }

    response = requests.get(url, headers=headers, params=querystring)
    json_data = response.json()

    i = 0

    while i < pageSize:
        hotelName = (json_data["data"]["body"]["searchResults"]["results"][i]["name"])
        hotelRating = (json_data["data"]["body"]["searchResults"]["results"][i]["starRating"])
        hotelAddress = (json_data["data"]["body"]["searchResults"]["results"][i]["address"]["streetAddress"])
        nightlyCost = (json_data["data"]["body"]["searchResults"]["results"][i]["ratePlan"]["price"]["current"])
        val = (hotelName, hotelRating, hotelAddress, nightlyCost, cityName)
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

        sql = "INSERT INTO sql5476262.hotels(Name,Rating,Address,Price,cityName) VALUES (%s, %s, %s, %s, %s)"
        
        mycursor.execute(sql, val)
        db.commit()

    except Error as e:
        print(e.msg) 

    close_db(db)   

def close_db(db):
    db.close()


obtainQuery(id, minPrice, maxPrice, sortBy)
