<template>
	<div>
		<div class="alert alert-success" role="alert" v-if="success">
			{{ success }}
		</div>
		<!-- этот add приходит как message с бэка: форма отправлена методом post, AdminController ее обработал, получили сообщение в admin.js, засунули его в router-view как props, и здесь приняли. Это так организовал я добавление отзыва: то есть с перезагрузкой страницы. Остальные действия - без перезагрузки страницы. Почему я сделал перезагрузку? Просто автоматически не обновлялись данные на странице. На самом деле можно было вызывать метод fetch по нажатию на submit формы, и метод vuex заново бы нам обновлял данные без перезагрузки. Осознай это! Этим вторым способом реализовано удаление -->
		<div class="alert alert-success" role="alert" v-if="timer">
			{{ add }}
		</div>
		<div class="alert alert-danger" role="alert" v-if="error">
			{{ error }}
		</div>
		<div class="big-table-container">
			<div class="grid_11">
				<h3>Здесь ты видишь таблицу отзывов.</h3>
				<p>Поредактируй ее, и изменится главный вид твоего сайта. Надо понимать, что есть отдельная таблица соответствия id отзыва с id его фильтра. Эту таблицу можно увидеть ниже. При редактировании и добавлении нового отзыва надо задать id фильтра, посмотрев на таблицу соответствия. </p>
				<h3>Для добавления нового отзыва нажми на кнопку</h3>
				<div class="add">
					<router-link :to="{name: `admin-feedbacks-add`}">
						<button type="button" class="btn btn-primary">Добавить отзыв</button>
					</router-link>	
				</div>	
			</div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<td>id</td>
							<td>Автор</td>
							<td>Должность</td>
							<td>Описание</td>
							<td>Текст</td>
							<td>Фильтр</td>
							<td>Маленькая картинка</td>
							<td>Большая картинка</td>
							<td>Редактировать</td>
							<td>Удалить</td>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(c, index) in feedbacks.connections" :key="index">
							<td>{{ index }}</td>
							<td>{{ feedbacks.feedbacks[index].author }}</td>
							<td>{{ feedbacks.feedbacks[index].position }}</td>
							<td>{{ feedbacks.feedbacks[index].description }}</td>
							<td>{{ feedbacks.feedbacks[index].text }}</td>
							<td>
								<p v-for="(filter, i) of feedbacks.connections[index]" :key="i">
									: {{ filter.name }}
								</p>
							</td>
							<td>{{ feedbacks.feedbacks[index].image_little }}</td>
							<td>{{ feedbacks.feedbacks[index].image }}</td>
							<td>
								<router-link :to="{name: 'admin-feedbacks-edit', params: {id: index }}">
									<button type="button" class="btn btn-dark">Edit</button>
								</router-link>
							</td>
							<td>
								<button type="button" class="btn btn-danger" @click="onDelete(index)">Delete</button>
							</td>
						</tr>
					</tbody>
				</table>							
			</div>
		</div>
	</div>
</template>
<script>
export default {
	data() {
		return {
			timer: false
		}
	},
	props: ['add'],
	mounted() {
		// был головняк с тем, что сообщение с бэка не знал, как удалить через несколько секунд, вот реализовал такую фигню
		this.timer = this.add
		setTimeout(() => {
			this.timer = false
		}, 3000)
	},
	computed: {
		feedbacks() {			
			return this.$store.getters.feedbacks
		},
		error() {
			return this.$store.getters.error
		},
		success() {
			return this.$store.getters.success
		},
	},
	methods: {
		onDelete(id) {
			const sure = confirm('Вы уверены?')
			if(sure) {
				this.$store.dispatch('deleteFeedback', id)
				this.$store.dispatch('fetchFeedbacks')
				window.scrollTo(0, 0)
			}
		},
	},
}
</script>
<style lang="scss">
	.add {
		margin: 10px 0 15px;
	}
</style>