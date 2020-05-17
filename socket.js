var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
// tu tworzymy podłączenie do Redisa
var redis = new Redis();

// tutaj używamy test-channel z Eventu
redis.subscribe('test-channel', function(err, count) {

});
// gdy test-channel na redisie się zmieni...
redis.on('message', function(channel, message) {
    // wypisz log na konsoli z wiadomością
    console.log('Message Recieved: ' + message);
    // wyciągnij dane z message JSON...
    message = JSON.parse(message);
    // puść do klientów nazwę eventu oraz dane (czyli nasze 'power' => '10')
    io.emit(channel + ':' + message.event, message.data);

});
// słuchaj na porcie 3000, tym samym na który zapuka skrypt w test.blade.php
http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
