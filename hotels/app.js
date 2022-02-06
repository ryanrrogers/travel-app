require('dotenv').config({path: './KEYS.env'})

let Amadeus = require('amadeus')

var amadeus = new Amadeus({
	clientId: process.env.CLIENT_ID,
	clientSecret: process.env.CLIENT_SECRET
})