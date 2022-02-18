let amadeus = require('./apiConnection.js')
let connection = require('../includes/db.js')

let flightSearch = (origin, destination, date, ticketsAdult) => {
    let response = amadeus.shopping.flightOffersSearch.get({
        originLocationCode: origin,
        destinationLocationCode: destination,
        departureDate: date,
        adults: ticketsAdult
    }).then(function(response){
        return amadeus.shopping.flightOffers.prediction.post(
          JSON.stringify(response)
        );
    }).then(function(response){
        return response.data
    }).catch(function(responseError){
        console.log(responseError)
    });

    return response
}

async function select (origin, destination, date, ticketsAdult) {
    flights = await flightSearch(origin, destination, date, ticketsAdult)

    for (const [key, value] of Object.entries(flights[1])) {
        console.log(`${key} ${value}`)
    }
}

module.exports = {flightSearch, select}


