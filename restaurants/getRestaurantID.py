import requests
import pandas as pd

def getRestaurant():

  url = 'https://api.yelp.com/v3/businesses/search'
  headers = {
    'Authorization': 'Bearer %s' % key 
}

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
  
  
