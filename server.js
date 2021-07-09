var express = require('express');
var app = express();

var fs = require('fs');
var options = {
    key: fs.readFileSync('/root/.ssh/server.key'),
    cert: fs.readFileSync('/root/.ssh/server.crt')
};

//const app = require('express')();
//const https = require('https').Server(options, app);
var server = require('https').createServer(options, app);

var port = process.env.PORT || 2083;
server.listen(port, function() {
    console.log('Server listening at port %d', port);
});
var io = require('socket.io')(server, {
    cors: {
        origin: "http://nutmor:8080",
        methods: ["GET", "POST"]
    }
});
io.on('connection', function(socket) {
    socket.on('queue', function(data) {
        io.sockets.emit(data.id, {
            message: data.message,
        });
    });
});