export default {
	state: {
		feedbacks: {},
	},
	mutations: {
		fetchFeedbacksFromAPI(state, payload) {
			state.feedbacks = payload
		}
	},
	actions: {
		async fetchFeedbacks({ commit }) {
			try {
				const response = await axios.get('/api/feedbacks')
				const filters = response.data.filters
				let connections = response.data.connections
				const feedbacks = response.data.feedbacks
				let classes = []
				for (let key in connections) {					
					for(let feed_key in feedbacks) {
						let classesForOneFeedback = ''
						connections[key].forEach(filter => {
							classesForOneFeedback += ` ${filter.class}`
						})
						classes.push(classesForOneFeedback)
						break
					}
				}
				for (let k in feedbacks) {
					feedbacks[k].classes = classes[k-1]
				}
				const result = {
					feedbacks,
					connections,
					filters,	
				}
				commit('fetchFeedbacksFromAPI', result)
			} catch (err) {
				commit('setError', err.message)
				throw err
			}


		},
		async setNewFeedbackData({ commit }, payload) {
			try {
				commit('clearError')
				commit('setLoading', true)
				// надо обязательно передават ОБЪЕКТ, иначе лара не поймет!!!
				const response = await axios.post('/update-feedback', payload)
				commit('setLoading', false)
				commit('setSuccess', response.data)
			} catch (err) {
				commit('setLoading', false)
				commit('setError', err.message)
				throw err
			}	
		},
		async deleteFeedback({ commit }, payload) {
			try {
				commit('clearError')
				commit('setLoading', true)
				const response = await axios.post(`/delete-feedback`, {id: payload})
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
		feedbacks(state) {
			return state.feedbacks
		}
	}
}