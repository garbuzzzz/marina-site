window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
		window.Popper = require('popper.js').default;
	
	// где-то здесь проблема с изотопом

    window.$ = window.jQuery = require('jquery');

	// где-то здесь проблема с изотопом. Удивительным образом ошибка, что функция изотопа не найдена, не появляется, если вызывать файл изотоп до этих строчек, а если вызывать после - появляется. Мало того, в первом случае ошибки нет, но все равно работает. решилось все подключением модуля, как изначально было в шаблоне, этот модуль обернут в функцию, и только внутри код изотопа. Вот только так и работает. Я точно не понял, но думаю, что проблема не в изотопе, а в jQuery, который неправильно определен. Дело в том, что в модуль передается jQuery, а внутри модуля он уже становится $. В этом вся и разница. А в этом файле, строчка выше, именно какие-то манипуляции с определением переменной jQuery. 
	// еще важно то, что в файле изотопа все делается только по window.load, и все работает. А если убрать и оставить как есть - то ошибки нет, но по клику - переходим по ссылке. И это при том, что если заново создать файл index.html, и там создать этот же код - то все работает.. хз.....
	
    require('bootstrap');
} catch (e) {}

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

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
