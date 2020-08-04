<template>
	<div id="subscribe" class="subscribe">
		<div class="cont">
			<div class="subscribe__row">
				<div class="subscribe__title">
					<h2>До встречи в социальных сетях :)</h2>
				</div>
				<div class="subscribe__items">
					<div class="subscribe__item">
						<a href="https://vk.com/garbuz_mari"><i class="fa fa-vk"></i></a>
					</div>
					<div class="subscribe__item">
						<a href="https://www.instagram.com/marina.smm_"><i class="fa fa-instagram"></i></a>
					</div>
					<div class="subscribe__item">
						<a href=""><i class="fa fa-telegram"></i></a>
					</div>
					<div class="subscribe__item">
						<a href=""><i class="fa fa-viber"></i></a>
					</div>
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
}
</script>
<style lang="scss">
.subscribe {
	padding: 60px;
	@media (max-width: 768px) {
		padding: 40px;
	}
	@media (max-width: 575px) {
		padding: 20px;
	}
	background: #303030;
		&__row {
			text-align: center;
			max-width: 360px;
			margin: auto;
			color: #fff;
			text-transform: uppercase;		
			}

		&__title {
			margin-bottom: 20px;
			& h2 {
				font-weight: 700;
				font-size: 30px;
				@media (max-width: 575px) {
					font-size: 20px;
				}
			}
				
		}

		&__items {
			display: flex;
			justify-content: center;
		}

		&__item {
			padding: 10px 14px;
			border: 1px solid #fff;
			margin-right: 15px;
			& .fa {
				font-size: 20px;
				color: red;
				@media (max-width: 575px) {
					font-size: 16px;
				}
			}
		}
}

</style>