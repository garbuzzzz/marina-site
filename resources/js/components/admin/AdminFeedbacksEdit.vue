<template>
	<div>
		<div class="big-table-container">
			<div class="alert alert-danger" role="alert" v-if="error">
				{{ error }}
			</div>
			<div class="grid_11">
				<h3>Здесь можно поредоктировать отдельный отзыв.</h3>
				<p>Надо понимать, что есть отдельная таблица соответствия id отзыва с id его фильтра. Эту таблицу можно увидеть ниже. При редактировании и добавлении нового отзыва надо задать id фильтра, посмотрев на таблицу соответствия</p>				
			</div>
				<div class="edit">
					<h3>А вот и обещанная таблица соответствия:</h3>
					<div class="edit__assoc">
						<table class="edit__assoc-table">
							<thead>
								<tr>
									<td>ID фильтра</td>
									<td>Название фильтра</td>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(f, ind) in filters" :key="ind">
									<td>{{ f.id }}</td>
									<td>{{ f.name }}</td>
								</tr>								
							</tbody>					
						</table>	
					</div>
					<div class="edit__form">
						<form @submit.prevent="onSubmit">
							<div class="form-group">
								<label for="author">Автор</label>
								<input type="text" class="form-control" id="author" aria-describedby="author"  autocomplete="off" v-model="feedback.author">
								<small id="author" class="form-text text-muted">Имя автора отзыва</small>
							</div>
							<div class="form-group">
								<label for="position">Должность</label>
								<input type="text" class="form-control" id="position" aria-describedby="position"  autocomplete="off" v-model="feedback.position">
								<small id="position" class="form-text text-muted">Должность автора отзыва</small>
							</div>
							<div class="form-group">
								<label for="description">Описание</label>
								<textarea type="text" class="form-control" id="description" rows="8" aria-describedby="description" v-model="feedback.description"></textarea>
								<small id="description" class="text-muted">Короткое описание отзыва</small>
							</div>
							<div class="form-group">
								<label for="text">Текст</label>
								<textarea type="text" class="form-control" id="text" rows="8" aria-describedby="text" v-model="feedback.text"></textarea>
								<small id="text" class="text-muted">Собственно текст отзыва</small>
							</div>
							<div class="form-group">
								<label for="image_little">Маленькая картинка</label>
								<input type="text" class="form-control" id="image_little" aria-describedby="image_little"  autocomplete="off" v-model="feedback.image_little">
								<small id="image_little" class="text-muted">Название файла маленькой картинки</small>
							</div>
							<div class="form-group">
								<label for="image">Большая картинка</label>
								<input type="text" class="form-control" id="image" aria-describedby="image"  autocomplete="off" v-model="feedback.image">
								<small id="image" class="text-muted">Название файла большой картинки</small>
							</div>
							<div class="form-group" v-for="(f, index) in feedback.filters" :key="index">
								<label :for="`filter${index}`">Фильтр {{index + 1}}</label>
								<input type="text" class="form-control" :id="`filter${index}`" :aria-describedby="`filter${index}`" autocomplete="off" v-model="f.id">
								<small :id="`filter${index}`" class="text-muted">Нужно ввести номер (ЦИФРУ) фильтра (от 1 до 4)</small>
							</div>
							<p>Если надо добавить больше фильтров - создавай новый отзыв, там можно будет ввести несколько фильтров. ЗДЕСЬ ЭТО НЕВОЗМОЖНО. </p>
							<button type="submit" class="btn btn-warning">Изменить</button>
						</form>
					</div>
				</div>
			</div>
		</div>
</template>
<script>
export default {
	data() {
		return {
			
		}
	},
	props: ['id'],
	computed: {
		feedback() {
			if(this.id === undefined) {
				this.$router.go(-1)
				return true
			}
			// да, так объекты сделаны, что надо 2 раза feedbacks прописывать
			return this.$store.getters.feedbacks.feedbacks[this.id]
		},
		filters() {
			// это просто перечисление ВСЕХ фильтров для таблицы соответствия
			return this.$store.getters.feedbacks.filters
		},
		error() {
			return this.$store.getters.error
		}
	},
	methods: {
		onSubmit() {
			let filters_ids = []
			this.feedback.filters.forEach(f => {
				filters_ids.push(Number(f.id))
			})

			const newFeedbackData = {
				id: this.id,
				author: this.feedback.author,
				position: this.feedback.position,
				description: this.feedback.description,
				text: this.feedback.text,
				image_little: this.feedback.image_little,
				image: this.feedback.image,
				filters: filters_ids
			}
			this.$store.dispatch('setNewFeedbackData', newFeedbackData)
			.then(() => {
				window.scrollTo(0,0)
				this.$router.push(`/admin/feedbacks`)				
			})
			.catch()
		}
	}
}
</script>
<style lang="scss">
	.edit__assoc {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;		
	}
	.edit__assoc-table {
		flex: 1 1 100%;
	}
</style>