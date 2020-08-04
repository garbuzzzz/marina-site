// как я намучался с этим изотопом... вот так работает, если вызывать после вызова бутстрап (следующая строчка) - не работает. Подробнее читай в файле бутстрап
// изотоп этот перенесен в файл ./main.js

// require('./main.js');
require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import routes from './routes'
import Vuelidate from 'vuelidate'
import store from './store'

Vue.use(VueRouter)
Vue.use(Vuelidate)


import AdminHome from './components/admin/AdminHome'
Vue.component('admin-home', AdminHome)

const admin = new Vue({
	data() {
		return {
			titles: []
		} 
	},
	el: '#admin',
	router: new VueRouter(routes),
	store,
	beforeCreate() {
		this.$store.dispatch('fetchTitles')
		// .then()
		// .catch(err => {})
		this.$store.dispatch('fetchFeedbacks')
		// .then()
		// .catch(err => {})
	}
});
