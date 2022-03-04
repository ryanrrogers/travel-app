require('dotenv').config({path: './KEYS.env'})

var mysql = require('mysql')

var connection = mysql.createConnection({
    host : 'sql5.freemysqlhosting.net',
    user : process.env.DB_ID,
    password : process.env.DB_SECRET,
    database : process.env.DB_ID
})

module.exports = connection