sockets = io("/messagePusher");

sockets.on("messages:App\\Events\\MessagePushed", function(message){
    console.log(message);
});
