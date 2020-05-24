require('./bootstrap');
require("./socket.io");
import Echo from "laravel-echo";
import Pusher from "pusher-js";

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'portal_key',
    cluster: 'mt1',
    forceTLS: true
});

window.Echo.channel('message')
    .listen('messagePusher', (e) => {
        console.log(e);
    });
// console.log(window.Echo.)
