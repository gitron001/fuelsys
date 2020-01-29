window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'anyKey',
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: true,
});

window.Echo.channel('home')
.listen('NewMessage', (e) => {
    switch (e.message.status) {
        case 1:
            document.getElementsByClassName('channel_'+e.message.channel_id)[0].style.color ='#333';
            //document.getElementsByClassName('text_'+e.message.channel_id)[0].textContent  = 'Pump - ' + e.message.channel_id;
            break;
        case 2:
            document.getElementsByClassName('channel_'+e.message.channel_id)[0].style.color ='#ffea00';
            document.getElementsByClassName('text_'+e.message.channel_id)[0].textContent  = (' + e.message.username + '-' + e.message.amount + ')';
            break;
        case 3:
            document.getElementsByClassName('channel_'+e.message.channel_id)[0].style.color ='#009d00';
            document.getElementsByClassName('text_'+e.message.channel_id)[0].textContent  = '(' + e.message.username + '-' + e.message.amount + ')';
            break;
        case 4:
            document.getElementsByClassName('channel_'+e.message.channel_id)[0].style.color ='#f8001a';
            document.getElementsByClassName('text_'+e.message.channel_id)[0].textContent  = ' (' + e.message.username + '-' + e.message.amount + ')';
            break;
      }

    console.log('DONE');
});
