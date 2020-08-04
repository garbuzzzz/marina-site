<template>
	<div>
		<div class="cont">
			<button class="btn btn-dark" @click="goBack">Назад</button>
			<div class="alert alert-danger" role="alert" v-if="error">
				{{ error }}
			</div>
<!-- !!! проблема обновления страницы - обновляешь, и не успевает подгрузиться с БД. Причем что на другой странице, где перебор ифом, а в остальном то же самое - там все работало. Так вот, надо просто в общем диве поставить условие v-if!!! -->
			<form @submit.prevent="onSubmit" v-if="title">
				<div class="form-group">
					<label for="name">Название секции на русском языке</label>
					<input type="text" class="form-control" id="name" aria-describedby="name" v-model="title.name" autocomplete="off">
					<small id="name" class="form-text text-muted">Это как будет называться данная секция для посетителя сайта</small>
				</div>
				<div v-if="title.image">
					<div class="form-group">
						<label for="image">Путь к картинке баннера</label>
						<input type="text" class="form-control" id="image" aria-describedby="image" v-model="title.image" autocomplete="off">
						<small id="image" class="form-text text-muted">Это - путь к картинке. Нужно загрузить новую картинку на сервер, и изменить путь, либо загрузить картинку с таким же названием, а старую удалить</small>
					</div>
				</div>
				<div class="form-group">
					<label for="text">Код содержимого секции</label>
					<textarea type="text" class="form-control" id="text" rows="12" aria-describedby="text" v-model="title.text"></textarea>
					<small id="text" class="form-text text-muted">Сюда нужно вставить собственно сам код секции</small>
				</div>
				<button type="submit" class="btn btn-warning">Изменить</button>
			</form>
		</div>
	</div>
</template>
<script>
export default {
	data() {
		return {
			// только слайс умеет с номера до номера делать, а не с номера до количества
			reg: this.$route.name.slice(6, -5)
		}
	},
	// хоть написано и props, на самом деле передается это из файла AdminSections как params для ссылки router-link :to
	props: ['id'],
	computed: {
		title() {
			// проблема была в том, что когда мы из файла секции нажимаем кнопку редактировать и переходим по ссылке в этот компонент, тогда да, передается этот id. если же мы обновляем страницу - то конечно id undefined. поэтому по хорошему нужно было бы его как-то из БД достать, зная адресную строку. Но я не стал заморачиваться, и если мы обновляем страницу - просто уходим со страницы редактирования на страницу отображения НАШЕЙ секции
			if(this.id === undefined) {
				this.$router.go(-1)
			}
			return this.$store.getters.titles.filter(t => t.id == this.id)[0]
		},
		error() {
			return this.$store.getters.error
		}
	},
	methods: {
		onSubmit() {
			const newSectionData = {
				name: this.title.name,
				text: this.title.text,
				id: this.title.id
			}
			this.$store.dispatch('setNewSectionData', newSectionData)
				.then(() => {
					this.$router.push(`/admin/${this.reg}`)
				})
				.catch()
		},
		goBack() {
			this.$router.push(`/admin/${this.reg}`)
		}
	},
}
</script>
<style lang="scss">

</style>