let amadeus = require('./apiConnection.js')

let flightSearch = (origin, destination, date, ticketsAdult) => {
    return amadeus.shopping.flightOffersSearch.get({
        originLocationCode: origin,
        destinationLocationCode: destination,
        departureDate: date,
        adults: ticketsAdult
    }).then(function (response) {
        return amadeus.shopping.flightOffers.prediction.post(
            JSON.stringify(response)
        );
    }).then(function (response) {
        // console.log(response.data)
        return response.data
    }).catch(function (responseError) {
        console.log(responseError)
        return responseError
    })
}



module.exports = {flightSearch}


/**
 * WILL NEED TO USE ASYNC AWAIT TO ACCESS INDIVIDUAL FLIGHTS
 * async function test() {
    let response = await flights.flightSearch('NYC', 'ATL', '2022-04-06', '2')
    console.log(response[0])
}
 */
