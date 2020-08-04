import Vue from 'vue'
import Vuex from 'vuex'
import sections from './sections'
import common from './common'
import feedbacks from './feedbacks'

Vue.use(Vuex)

export default new Vuex.Store({
	modules: {
		sections,
		common,
		feedbacks,
	}
})
