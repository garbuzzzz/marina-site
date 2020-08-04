// как я намучался с этим изотопом... вот так работает, если вызывать после вызова бутстрап (следующая строчка) - не работает. Подробнее читай в файле бутстрап
// изотоп этот перенесен в файл ./main.js

require('./main.js');
require('./bootstrap'); // это не css фреймворк, это просто файл загрузки каких-то js штук

window.Vue = require('vue');
import VueRouter from 'vue-router'
import routes from './routes'
import Vuelidate from 'vuelidate'
import store from './store'

import Navbar from './components/Navbar'
import Banner from './components/Banner'
import About from './components/About'
import Services from './components/Services'
import Feedbacks from './components/Feedbacks'
import FeedbackModal from './components/FeedbackModal'
import Counter from './components/Counter'
import Contact from './components/Contact'
import Subscribe from './components/Subscribe'
import Scroll from './components/Scroll'

Vue.use(VueRouter)
Vue.use(Vuelidate)

Vue.component('navbar', Navbar);
Vue.component('banner', Banner);
Vue.component('about', About);
Vue.component('services', Services);
Vue.component('feedbacks', Feedbacks);
Vue.component('feedback-modal', FeedbackModal);
Vue.component('counter', Counter);
Vue.component('contact', Contact);
Vue.component('subscribe', Subscribe);
Vue.component('scroll', Scroll);

const app = new Vue({
	el: '#app',
	router: new VueRouter(routes),
	store,
	beforeCreate() {
		this.$store.dispatch('fetchTitles')
		this.$store.dispatch('fetchFeedbacks')
	}
});
