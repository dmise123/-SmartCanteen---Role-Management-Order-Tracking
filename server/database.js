const mysql = require("mysql");
const config = require('./config/config.js');



 function InitDB(){
    const connection = mysql.createConnection({
        host: config.database.host,
        user: config.database.username,
        password: config.database.password,
        database: config.database.name,
        port: config.database.port,
    });
    
    
    connection.connect(function (err) {
        if (err) throw err;
        console.log("Database Conected ...");
    });
    
    return connection;
}
module.exports = { InitDB };