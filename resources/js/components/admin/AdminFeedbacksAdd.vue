<template>
	<div>
		<div class="big-table-container">
			<div class="alert alert-danger" role="alert" v-if="error">
				{{ error }}
			</div>
			<div class="grid_11">
				<h3>Здесь можно создать отдельный отзыв.</h3>
				<p>Надо понимать, что есть отдельная таблица соответствия id отзыва с id его фильтра. Эту таблицу можно увидеть ниже. При добавлении нового отзыва надо задать id фильтра, посмотрев на таблицу соответствия</p>
			</div>
				<div class="edit">					
					<h3>Таблица соответствия:</h3>				
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
					<div class="add__form">
						<!-- @submit.prevent="onSubmit" -->
						<form method="post" action="/admin/feedbacks">
							<!-- скрытый инпут с токеном -->
							<input type="hidden" name="_token" :value="token">
							<div class="form-group">
								<label for="author">Автор</label>
								<input type="text" class="form-control" id="author" aria-describedby="author"  autocomplete="off" name="author">
								<small id="author" class="form-text text-muted">Имя автора отзыва</small>
							</div>
							<div class="form-group">
								<label for="position">Должность</label>
								<input type="text" class="form-control" id="position" aria-describedby="position"  autocomplete="off" name="position">
								<small id="position" class="form-text text-muted">Должность автора отзыва</small>
							</div>
							<div class="form-group">
								<label for="description">Описание</label>
								<textarea type="text" class="form-control" id="description" rows="8" aria-describedby="description" name="description"></textarea>
								<small id="description" class="text-muted">Короткое описание отзыва</small>
							</div>
							<div class="form-group">
								<label for="text">Текст</label>
								<textarea type="text" class="form-control" id="text" rows="8" aria-describedby="text" name="text"></textarea>
								<small id="text" class="text-muted">Собственно текст отзыва</small>
							</div>
							<div class="form-group">
								<label for="image_little">Маленькая картинка</label>
								<input type="text" class="form-control" id="image_little" aria-describedby="image_little"  autocomplete="off" name="image_little">
								<small id="image_little" class="text-muted">Название файла маленькой картинки</small>
							</div>
							<div class="form-group">
								<label for="image">Большая картинка</label>
								<input type="text" class="form-control" id="image" aria-describedby="image"  autocomplete="off" name="image">
								<small id="image" class="text-muted">Название файла большой картинки</small>
							</div>
							<div class="form-group">
								<label for="filters">Фильтры</label>
								<input type="text" class="form-control" id="filters" aria-describedby="filters" autocomplete="off" name="filters">
								<small id="filters" class="text-muted">Нужно ввести номер (ЦИФРУ) фильтра (от 1 до 4) ЧЕРЕЗ ЗАПЯТУЮ</small>
							</div>
							<button type="submit" class="btn btn-warning">Создать</button>
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
			author: null,
			position: null,
			description: null,
			text: null,
			image_little: null,
			image: null,
			add_filters: null,
		}
	},
	props: ['token'],
	computed: {
		filters() {
			// это просто перечисление ВСЕХ фильтров для таблицы соответствия
			return this.$store.getters.feedbacks.filters
		},
		error() {
			return this.$store.getters.error
		}
	},
}
</script>
<style lang="scss">

</style>