let amadeus = require('./apiConnection.js')
let connection = require('../includes/db.js');
const { connect } = require('../includes/db.js');

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

async function dbFlights (origin, destination, date, ticketsAdult) {
    flights = await flightSearch(origin, destination, date, ticketsAdult)
    
    airline = `'${flights[1].validatingAirlineCodes}'`
    price = flights[1].price.grandTotal
    seatsAvailable = flights[1].numberOfBookableSeats
    oneWay = flights[1].oneWay

    connection.connect(function(err) {
        if (err) throw err;
        console.log('connected!')
        var sql = `INSERT INTO flights (airline, price, seats, one_way) VALUES (${airline}, ${price}, ${seatsAvailable}, ${oneWay})`
        connection.query(sql, function (err, result){
            if (err) throw err
            console.log('record inserted')
        })
    })

}

module.exports = {flightSearch, dbFlights}


