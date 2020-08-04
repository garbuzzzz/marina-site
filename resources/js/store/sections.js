export default {
	state: {titles: []},
	mutations: {
		fetchTitlesFromAPI(state, payload) {			
			state.titles = payload
		}
	},
	actions: {
		async fetchTitles({ commit }) {
			// можно было и так, но делал как Минин. 
			// axios.get('api/titles').then((response) => {
			// 	commit('createTitlesFromAPI', response.data)
			// })
			try {
				const response = await axios.get('/api/titles')
				commit('fetchTitlesFromAPI', response.data)
			} catch(err) {
				throw err
			}	
		},
		async setNewSectionData({ commit }, payload) {
			try {
				commit('clearError')
				commit('setLoading', true)
				// надо обязательно передават ОБЪЕКТ, иначе лара не поймет!!!
				const response = await axios.post('/update-section', {id: payload.id, name: payload.name, text: payload.text, image: payload.image})
				commit('setLoading', false)
				commit('setSuccess', response.data)
			} catch (err) {
				commit('setLoading', false)
				commit('setError', err.message)
				throw err
			}				
		},
	},
	getters: {
		titles(state) {
			return state.titles
		},
	}
}