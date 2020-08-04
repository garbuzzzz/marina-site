<template>
	<div id="banner">
		<!-- :data-vide-bg="img" не знаю, почему не работает вот так. -->
		<!-- не работает скорее потому, что библиотека vide создает дополнительный див внутри этого с абтибутом bg, и вот у него есть фоновая картинка. Почему-то это все делается от руки, но если подтягивать из БД - то нет. -->
		<!-- data-vide-bg="/img/test.jpg" -->
		<div
			class="" 
			data-vide-bg="/img/test.jpg"
			data-vide-options="playbackRate: 0.1, position: '0 100%', loop: true"
		>
			<div class="banner-content">
				<div class="cont">
					<div class="banner-content__row">
						<!-- сюда вставится из БД код - описание на баннере -->
						{{ banner }}
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
			// :data-vide-bg="img" не знаю, почему не работает вот так.
			img: '',
		}
	},
	computed: {
		banner() {
			this.$store.getters.titles.filter(t => {
				if(t.alias === '#banner') {
					document.querySelector('.banner-content__row')
						.insertAdjacentHTML('afterbegin', t.text)
					// должно бы работать, но нет
					this.img = t.image
				}
			})
		}
	},
	watch: {
		img: function(new_val, old) {			
			this.img = new_val
		}
	},
}
</script>
<style lang="scss">
	.banner-content{
		height: 100vh;
		width: 100vw;
	}
.banner-content__title h2{
	text-align: center;
}
.banner-text{
	text-align: center;
	padding: 0 25px 0 15px;
}
.banner-content__row{
	display: flex;
	height: 100%;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
</style>