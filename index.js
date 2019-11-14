let app = require('express')();
let http = require('http').Server(app);
let io = require('socket.io')(http);

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html')
});


http.listen(4015, () => {
    console.log('Listening on port *: 4015');
});

io.on('connection', (socket) => {

    socket.emit('connections', Object.keys(io.sockets.connected).length);

    socket.on('disconnect', () => {
        console.log("A user disconnected");
    });

    socket.on('chat-message', (data) => {
        socket.broadcast.emit('chat-message', (data));
    });
    socket.on('chat-message1', (data) => {
        socket.broadcast.emit('chat-message1', (data));
    });

    socket.on('chat-message2', (data) => {
        socket.broadcast.emit('chat-message2', (data));
    });

    socket.on('typing', (data) => {
        socket.broadcast.emit('typing', (data));
    });

    socket.on('stopTyping', () => {
        socket.broadcast.emit('stopTyping');
    });

    socket.on('joined', (data) => {
        socket.broadcast.emit('joined', (data));
    });

    socket.on('leave', (data) => {
        socket.broadcast.emit('leave', (data));
    });
    socket.on('pl-messages', (data) => {
        socket.broadcast.emit('pl-messages', (data))
    })
    socket.on('pin', (data) => {
        socket.broadcast.emit('pin', (data))
    })

});