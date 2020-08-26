let http = require('http').Server();
let io = require('socket.io')(http);
let Redis = require('ioredis');

let redis = new Redis();
redis.subscribe('new-action');
redis.on('message', function(channel, message) {
    console.log('Message recieved: ' + message);
    console.log('Channel: ' + channel);
    message = JSON.parse(message);
    io.emit(channel+ ':' + message.event, message.data);
})

http.listen(3000, function() {
    console.log('Listening on Port: 3000');
});
