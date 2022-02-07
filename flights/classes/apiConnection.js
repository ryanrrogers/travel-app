require('dotenv').config({path: './includes/KEYS.env'})

let Amadeus = require('amadeus')

var amadeus = new Amadeus({
	clientId: process.env.CLIENT_ID,
	clientSecret: process.env.CLIENT_SECRET
})

module.exports = amadeus