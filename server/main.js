const app = require('express')();
const server = require('http').createServer(app);
const io = require('socket.io')(server, {
    cors: {
      origin: '*',
    }
  });
const { InitDB } = require('./database.js');
const config = require('./config/config.js');
const port = config.server.port;
const { InitServer }= require('./socket.js')


function Init(){

    const DB = InitDB();
    InitServer(io, DB);

    server.listen(port, function() {
        console.log(`Listening on port ${port}`);
      });



}
    

Init();




