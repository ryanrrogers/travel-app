let amadeus = require('./apiConnection.js')

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
        console.log(response.data)
        return response.data
    }).catch(function(responseError){
        console.log(responseError)
        return responseError
    });

    return response
}

// async function test() {
//     let response = await flightSearch('NYC', 'ATL', '2022-04-06', '2')
//     console.log(response[0])
// }


module.exports = {flightSearch}


