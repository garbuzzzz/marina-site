<template>
<div class="services" id="services">
	{{ services }}
</div>
</template>
<script>
export default {
	data() {
		return {
			
		}
	},
	computed: {
		services() {
			this.$store.getters.titles.filter(t => {
				if(t.alias === '#services') {
					document.querySelector('#services')
						.insertAdjacentHTML('afterbegin', t.text)
				}
			})
		}
	}
}
</script>
<style lang="scss">
.services {
	background: #4C4C4C;
	color: #fff;
	padding-bottom: 10px;
		&__title:after{	
				background-color: #fff;
			}
		&__title {
			@media (max-width: 570px) {
				margin-bottom: 20px;
			}			
		}
		&__row {
			display: flex;
			flex-wrap: wrap;
			margin: 0 -15px;
			@media (max-width: 660px) {
				flex-direction: column;
				margin: 0 15px;
			}
		}
		&__column {
			flex: 0 1 33.333%;
			padding: 0 15px;
			margin-bottom: 40px;
			@media (max-width: 570px) {
				margin-bottom: 18px;
			}
		}
		&__icon {
			font-size: 36px;
			flex: 1 1 15%;
			position: relative;
			
			& i {
				position: absolute;
						
				@media (max-width: 1200px) {
					font-size: 30px;
					margin-top: 5px;
					top: -3px;
					left: -5px;
				}
				@media (max-width: 992px) {
					font-size: 28px;
				}
				@media (max-width: 660px) {
					font-size: 42px;
				}
				@media (max-width: 500px) {
					font-size: 32px;
					margin-top: 0;
					position: relative;
					top: 0;
				}
				@media (max-width: 444px) {
					position: relative;				
					left: -20px;
				}
			}
		}
		&__item {
			display: flex;
		}
		&__body{
			flex: 1 0 85%;
		}
		&__subtitle {
			padding-bottom: 15px;
		}
}
</style>