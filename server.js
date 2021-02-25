var express = require('express');
var app = express();
var server = require('http').createServer(app);

var port = process.env.PORT || 3000;
server.listen(port, function () {
    console.log('Server listening at port %d', port);
});
var io = require('socket.io')(server, {
    cors: {
        origin: '*',
    }
});
io.on('connection', function (socket) {
    socket.on('queue', function (data) {
        io.sockets.emit(data.id, {
            message: data.message,
        });
    });
});
