<template>
	<div id="mymynavbar" class="mynavbar">
			<nav class="mynav navbar">
				<a href="/" class="mynavbar__brand">
					<img src="img/photo.jpg" alt="" class="logo">
				</a>
				<div class="mynavbar__desc">
					<p>MARINA <strong>HARBUZ</strong></p>
					<p><strong>UX/UI</strong> DESIGNER</p>
				</div>
				<div class="mynavbar__titles">
					<!-- именно ml-auto выравнивает все по правому углу! действует как v-spacer -->
						<ul class="AnimateScroll" @click="toggleActiveLink">
							<li v-for="(title, index) in titles" :key="index">
							<!-- не прокатило с роутер-линком: не открывались ссылки по id закладкам. хотя, от него преимущество было лишь в том, что он активную ссылку делал сам по умолчанию -->
							<!-- :href="title.alias" -->
									<!-- <router-link 
										:to="title.alias" 
										class="nav-link my-text-color my-text-size"									
									>{{ title.name }}</router-link> -->
								<a :href="title.alias">{{ title.name }}</a>
							</li>
						</ul>				
				</div>
				<button class="mynavbar__hire" data-toggle="modal" data-target="#modal">Заказ!</button>
				<button class="mynavbar__burger" @click="burgerToggler"><i class="fa fa-bars"></i></button>
				<button class="mynavbar__hire-icon" data-toggle="modal" data-target="#modal"><i class="fa fa-handshake-o"></i></button>
				<Modal></Modal>
			</nav>
			
	</div>
</template>
<script>
import Modal from './Modal'
export default {
	name: 'mynavbar',
	components: {
		Modal,
	},
	data() {
		return {
			// titles: []
		}
	},
	computed: {
		titles() {
			return this.$store.getters.titles
		}
	},
	methods: {
		// пришлось написать эту фукнцию, потому что vue router-link не давал переходить на id элементов, пришлось перейти на обычные ссылки
		toggleActiveLink() {
			if(event.target.tagName === 'A') {
				Array.from(event.target.parentElement.parentElement.getElementsByTagName('a'))				
					.forEach(a => a.classList.remove('active'))
				event.target.classList.add('active')
				if(document.body.clientWidth < 768) {
					this.burgerToggler()
				}
			}			
		},
		// эту штуку я написал специально для того, чтобы автоматически подкрашивалась ссылка в навигации, если мы перемещаемся по странице. Сделано как костыль, ничего изменить нельзя, все тупо привязано к пикселям по высоте. 
		scrollLinkToggler() {
			window.addEventListener('scroll', () => {
				if(pageYOffset > 0 && pageYOffset < 400) {
					const links = Array.from(document.querySelectorAll('.mynavbar__titles a'))
					links.forEach((link) => link.classList.remove('active'))
					links[0].classList.add('active');
				}
				if(pageYOffset >= 400 && pageYOffset < 1250) {
					const links = Array.from(document.querySelectorAll('.mynavbar__titles a'))
					links.forEach((link) => link.classList.remove('active'))
					links[1].classList.add('active');
				}
				if(pageYOffset >= 1250 && pageYOffset < 1800) {
					const links = Array.from(document.querySelectorAll('.mynavbar__titles a'))
					links.forEach((link) => link.classList.remove('active'))
					links[2].classList.add('active');
				}
				if(pageYOffset >= 1650 && pageYOffset < 2590) {
					const links = Array.from(document.querySelectorAll('.mynavbar__titles a'))
					links.forEach((link) => link.classList.remove('active'))
					links[3].classList.add('active');
				}
				if(pageYOffset >= 2590) {
					const links = Array.from(document.querySelectorAll('.mynavbar__titles a'))
					links.forEach((link) => link.classList.remove('active'))
					links[4].classList.add('active');
				}
			})
			
		},
		burgerToggler() {
			const $titles = $('.mynavbar__titles ul')
			$titles.slideToggle(190)
		},
		getScrollbarWidth() {
			return document.documentElement.clientWidth - window.innerWidth
		}
	},
	mounted() {	
		window.addEventListener('scroll', () => {
			if(pageYOffset) {
				$('.mynav').addClass('bg_white')
				$('.mynavbar').addClass('bg_white')
			} else {
				$('.mynav').removeClass('bg_white')
				$('.mynavbar').removeClass('bg_white')
			}
		});
		// прекрасной функцией получаем ширину полосы прокрутки
		const scrollbarWidth = this.getScrollbarWidth()
		this.scrollLinkToggler()
		const $titles = $('.mynavbar__titles ul')
		if(document.body.clientWidth < (768 - scrollbarWidth)) {
			$titles.hide()
		}
		$(window).resize(function() {
			if(document.body.offsetWidth <= (768 - scrollbarWidth)) {
				$titles.hide()
			} else {
				$titles.show()
			}
		})
	}
}
</script>
<style lang="scss">
	.mynavbar {
		max-width: 95%;
		margin: auto;
		background: transparent;
		position: fixed;
		width: 100%;
		top: 0;
		left: 2.5%;
		transition: all ease 0.4s;
		z-index: 50;
		&.bg_white {
			max-width: 100%;
			left: 0;
		}
		&__brand {
			@media (max-width: 420px) {
				height: 40px;
				width: 40px;
			}
			& img{
				height: 60px;
				width: 60px;
				border-radius: 50%;
				align-self: center;
				@media (max-width: 768px) {
					// чтобы не скакала картинка ниже
					position: relative;
					top: 1px;
				}
				@media (max-width: 420px) {
					height: 40px;
					width: 40px;
					position: relative;
					left: 20px;
				}				
			}
		}
		& .mynav {
			width: 100%;
			margin: auto;
			display: flex;
			justify-content: space-around;
			flex-wrap: nowrap;
		}
		&__desc{
			display: flex;
			flex-direction: column;
			justify-content: center;
			margin-left: 10px;
			margin-right: 300px;
			flex-wrap: nowrap;
			@media (max-width: 1039px) {
				margin-right: 130px;
			}
			@media (max-width: 900px) {
				margin-right: 70px;
			}
			@media (max-width: 840px) {
				margin-right: 20px;
			}
			@media (max-width: 768px) {
				margin-right: 0px;
			}
			@media (max-width: 420px) {
				position: relative;
				left: 20px;
			}
			& p {
				display: flex;
				margin: 0;
			}
		}
		&__titles {
			align-self: center;
			flex: 1 0 auto;
			margin: 0 25px 0 50px;
			display: flex;
			align-items: center;			
			& ul {
				width: 100%;
				display: flex;
				justify-content: space-between;
				align-items: center;				
				margin: auto;
				@media (max-width: 768px) {
					position: fixed;
					top: 80px;
					left: 5%;
					width: 90%;
					height: 27%;
					border: 1px solid black;
					flex-direction: column;
					background: #fff;
				}
				& li a {
					color: #303030 !important;
					font-size: 1.1em;
					padding: 10;
					// чтобы была анимация подчеркивания, это из инета и более менее понято:
					display: inline-block;
					color:#ffeb3b;
					line-height: 1;
					text-decoration:none;
					cursor: pointer;
					position: relative;
					&:after {
						position: absolute;
						top: 46%;
						left: 7.5%;
						background-color: #303030;
						display: block;
						content: "";
						height: 1.5px;
						width: 0%;
						-webkit-transition: width .3s ease-in-out;
						-moz--transition: width .3s ease-in-out;
						transition: width .3s ease-in-out;
					}
					&:hover:after,
					&:focus:after,
					&.active:after{
						width: 85%;
					}				
				}
			}
		}
		&__hire {
			align-self: center;
			display: inline-block;
			padding: 5px 5px;
			background: #fff;
			color: #303030;
			border: 1px solid black;
			border-radius: 3px;
			font-size: 15px;
			font-weight: 300;
			margin-right: 10px;
			&:hover {
				box-shadow: 0 0 7px #303030;
			}
			@media (max-width: 768px) {
				display: none;
			}
		}
		&__burger {
			outline: 1.5px solid black;
			flex-shrink: 0;
			display: none;
			&:hover {
				box-shadow: 0 0 7px #303030;
			}
			&:focus {
				outline: 1.5px solid black;
			}
			@media (max-width: 768px) {
				display: inline;
				width: 35px;
				height: 35px;
			}
			@media (max-width: 420px) {
				display: inline;
				width: 30px;
				height: 30px;
				position: relative;
				left: -20px;
			}
		}
		.mynavbar__hire-icon {
			outline: 1.5px solid black;
			display: none;
			flex-shrink: 0;
			margin-left: 20px;
			&:hover {
				box-shadow: 0 0 7px #303030;
			}
			&:focus {
				outline: 1.5px solid black;
			}
			@media (max-width: 768px) {
				display: inline;
				width: 35px;
				height: 35px;
			}
			@media (max-width: 420px) {
				margin-left: 14px;
				display: inline;
				width: 30px;
				height: 30px;
				position: relative;
				left: -20px;
			}
		}
		.bg_white{
			transition: all ease 0.4s;
			background: #fff;
			box-shadow: 0 0 20px rgba(0,0,0,0.9);
			height: 65px;
			& li {
				position: relative;
				top: 4px;
			}
			& img {
				position: relative;
				top: -1px;
			}
		}
}
</style>	