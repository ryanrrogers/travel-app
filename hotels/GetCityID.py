import requests
import json

def getLocation():
    locationName = input("What is the name of your destination?")
    url = "https://hotels4.p.rapidapi.com/locations/search"

    querystring = {"query":locationName,"locale":"en_US"}

    headers = {
        'x-rapidapi-host': "hotels4.p.rapidapi.com",
        'x-rapidapi-key': "8a2d3f00c4msh43ba13fbd502ca5p1d3889jsn8bcad05f141a"
        }

    response = requests.request("GET", url, headers=headers, params=querystring)
    json_data = response.json()
    cityID = json_data["suggestions"][0]["entities"][0]["destinationId"]
    return cityID, locationName

getLocation()