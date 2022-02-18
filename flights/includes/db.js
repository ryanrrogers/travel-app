require('dotenv').config({path: './KEYS.env'})

var mysql = require('mysql')

var connection = mysql.createConnection({
    host : 'sql5.freemysqlhosting.net',
    //database : 'flights',
    user : process.env.DB_ID,
    password : process.env.DB_SECRET
})

connection.connect(function(err) {
    if (err) {
        console.log('Error connecting: ' + err.stack)
        return
    }

    console.log('Connected as id ' + connection.threadId)
})