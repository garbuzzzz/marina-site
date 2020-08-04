<template>
	<div class="admin-banner">
		<div class="spinner" v-if="loading">			
			<div class="spinner-border text-info" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<div class="alert alert-success" role="alert" v-if="success">
			{{ success }}
		</div>
		<div id="content" class="container_16 clearfix">
			<div class="grid_11">
				<h3>Здесь ты видишь таблицу.</h3>
				<p>Поредактируй ее, и изменится главный вид твоего сайта.</p>				
			</div>
			<div class="table">
				<table>
					<thead>
						<tr>
							<td>id</td>
							<td>name</td>
							<td>alias</td>
							<td>text</td>
							<td>Редактировать</td>
						</tr>
					</thead>
					<tbody>
						<tr v-for="title in titles" :key="title.id">
							<td>{{ title.id }}</td>
							<td>{{ title.name }}</td>
							<td>{{ title.alias }}</td>
							<td>{{ title.text }}</td>
							<td>
								<router-link :to="{name: `${routeName}-edit`, params: {id: title.id}}">
									<button type="button" class="btn btn-dark">Редактировать</button>
								</router-link>
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
			routeName: this.$route.name
		}
	},
	// а без watch ничего бы не было: так как в файле маршрутов мы с разных марштуров попадаем на этот компонент, то в адресной строке маршруты менялись, а содержимое компонента - нет. Поэтому мы следим за изменениями а вдресной строке, затем вызываем функцию, которая изменяет переменную routeName в связи с текущим маршрутом...
	watch: {
		$route: 'updateRoute',
	},
	methods: {
		updateRoute() {
			this.routeName = this.$route.name
		}
	},
	computed: {
		titles() {
			const titles_all = this.$store.getters.titles
			const result = []
			titles_all.forEach(title => {
				// просто откусываем от имени маршрута (например, admin-about) вторую часть, чтобы получить алиас, и сравнить его с алиасом в БД. По хорошему надо бы исползовать gerex
				let reg = this.routeName.substr(6)
				if(title.alias === `#${reg}`) {
					result.push(title)
				}
			})
			return result
		},
		success() {
			return this.$store.getters.success
		},
		loading() {
			return this.$store.getters.loading
		},
	},
}
</script>
<style lang="scss">
thead {
	color: blueviolet;
}
.spinner {
	display: flex;
	justify-content: center;
	align-items: center;
}
</style>