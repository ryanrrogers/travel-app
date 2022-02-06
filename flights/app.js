require('dotenv').config({path: './KEYS.env'})

let Amadeus = require('amadeus')

var amadeus = new Amadeus({
	clientId: process.env.CLIENT_ID,
	clientSecret: process.env.CLIENT_SECRET
})

amadeus.shopping.flightOffersSearch.get({
    originLocationCode: 'SYD',
    destinationLocationCode: 'BKK',
    departureDate: '2022-04-04',
    adults: '2'
}).then(function(response){
    return amadeus.shopping.flightOffers.prediction.post(
      JSON.stringify(response)
    );
}).then(function(response){
    console.log(response.data);
}).catch(function(responseError){
    console.log(responseError);
});