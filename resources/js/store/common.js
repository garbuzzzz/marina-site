export default {
	state: {
		loading: false,
		success: null,
		error: null,
	},
	mutations: {
		clearError(state) {
			state.error = null
		},
		setLoading(state, payload) {
			state.loading = payload
		},
		setSuccess(state, payload) {
			state.success = payload
			setTimeout(() => {
				state.success = null
			}, 3000)
		},
		setError(state, payload) {
			state.error = `Неизвестная ошибка на сервере: обратись, дурындочка, к программисту. Текст ошибки: ${payload}`
		},
	},
	actions: {},
	getters: {
		loading(state) {
			return state.loading
		},
		error(state) {
			return state.error
		},
		success(state) {
			return state.success
		},
	}
}