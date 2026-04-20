import axios from 'axios';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Echo = new Echo({
    //broadcaster: 'reverb',
    broadcaster: 'pusher',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: '127.0.0.1',
    wsPort: 8080,
    forceTLS: false,
    disableStats: true,
    cluster: 'mt1',
});
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

//import './echo';import Echo from 'laravel-echo';

