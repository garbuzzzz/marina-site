<template>
<div class="about" id="about">
		{{ about }}
</div>
</template>
<script>
export default {
	data() {
		return {
			
		}
	},
	computed: {
		about() {
			this.$store.getters.titles.filter(t => {
				if(t.alias === '#about') {
					document.querySelector('#about')
						.insertAdjacentHTML('afterbegin', t.text)
				}
			})
		}
	}
}
</script>
<style lang="scss">
.progress{
	margin-bottom: 10px;
}
.text{
	font-size: 14px;
	line-height: 19px;
	@media (max-width: 570px) {
		margin-bottom: 8px;
	}
}
.about {
	background: lightgrey;
	padding-bottom: 10px;
		&__row {
			display: flex;
			flex-wrap: wrap;
			margin: 0 -15px;
			@media (max-width: 570px) {
				flex-direction: column;
				margin: 0 5px;
			}
		}		
		&__column {
			flex: 0 1 50%;
			padding: 0 15px;
			margin-bottom: 30px;
			@media (max-width: 570px) {
				padding: 0;
				margin: 5px;
			}
		}
		&__subtitle {
			font-weight: 300 !important;
			text-transform: uppercase;
			font-size: 22px;
			padding: 15px 0;
			@media (max-width: 570px) {
				padding: 5px 0;
			}
		}
		&__card {
			background: #fff;
			padding: 15px 25px;			
		}
		&__card-item {
			display: flex;
		}
		&__education-item {
			flex: 1 1 22%;
			font-size: 18px;
		}
		&__specializ-item {
			flex: 1 1 78%;
		}
}
</style>

