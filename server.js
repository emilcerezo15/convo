/**
 * Created by emilio.cerezo on 2/16/17.
 */

var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

io.on('connection', function(socket){

    console.log('A user connected');

    socket.on('disconnect', function(){
        console.log('user disconnected');
    });

//    socket.on('getUsers', function () {
       io.emit('ajxUsers');
//    });

});

http.listen(3000, function(){

    console.log('listening on *:3000');

});