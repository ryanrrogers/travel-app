let amadeus = require('./apiConnection.js')

let flightSearch = () => {
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
}

let test = () => {
    console.log('Hello World!')
}

module.exports = {flightSearch, test}







