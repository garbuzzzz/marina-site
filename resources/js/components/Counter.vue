<template>
	<div id="counter" class="counter">
		<div class="cont">
			<div class="counter__row">
				<div class="counter__column">
					<div class="counter__num">
						<i class="fa fa-ravelry" aria-hidden="true"></i>
						<span>2500</span>
					</div>
					<div class="counter__text">
						<p>projected completed</p>						
					</div>
				</div>
				<div class="counter__column">
					<div class="counter__num">
						<i class="fa fa-flag" aria-hidden="true"></i>
						<span>3</span>
					</div>
					<div class="counter__text">
						<p>projected completed</p>						
					</div>
				</div>
				<div class="counter__column">
					<div class="counter__num">
						<i class="fa fa-code" aria-hidden="true"></i>
						<span>345</span>
					</div>
					<div class="counter__text">
						<p>projected completed</p>						
					</div>
				</div>
				<div class="counter__column">
					<div class="counter__num">
						<i class="fa fa-smile-o" aria-hidden="true"></i>
						<span>1234</span>
					</div>
					<div class="counter__text">
						<p>projected completed</p>						
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
			count: 4
		}
	},
}
</script>
<style lang="scss">
.counter {
	padding: 75px 0;
	background: #4C4C4C;
	color: #fff;
	@media (max-width: 768px) {
		padding: 30px 0;
	}
	@media (max-width: 440px) {
		padding: 23px 0;
	}
		&__row {
			display: flex;
			justify-content: space-between;
			@media (max-width: 768px) {
				flex-direction: column;
				align-items: center;
			}
		}
		&__num {
			font-size: 32px;
			line-height: 36px;
			font-weight: 700;
			margin-bottom: 7px;
			& span {
				@media (max-width: 768px) {
					font-weight: 500;
					font-size: 24px;
					font-family: 'Times New Roman', Times, serif;
					position: relative;
					top: -3px;
					left: 10px;
				}
				
			}
		}

		&__text {
			font-size: 16px;
		}
}
</style>