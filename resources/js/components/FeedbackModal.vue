<template>
  <div>
  	<div
			v-for="(feedback, index) in feedbacks" :key="index"
			:id="'details'+index"
			class="modal fade feedbacks__modal"
			role="dialog"
		>
	      <div class="modal-dialog modal-lg">
	          <div class="modal-content">
	              <div class="modal-header bg-dark text-light">                     
	                  <div class="name">
	                  	<h4 class="modal-title">{{ feedback.author }}</h4>
		                  <h5 class="modal-title">{{ feedback.position }}</h5>
	                  </div>
										<button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
	              </div>
	              <div class="modal-body">
	                  <img :src="feedback.image" alt="" />
	              </div>
	              <div class="modal-footer feedbacks__desc">
	                  <p>{{ feedback.text }}</p>
	                  <p>And finally, I finished the design.</p>
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
	props: ['feedbacks'],
	// вот как нужно следить за изменением props!!!
	watch: {
		feedbacks: function(new_val, old) {			
			this.feedbacks = new_val
		}
	},
}
</script>
<style lang="scss">
.name {
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
}
	.modal-title{
		margin: 0 auto;
	}

	.feedbacks__modal .modal-body {
			text-align: center;
	}

	.feedbacks__modal .modal-body img {
			max-width: 100%;
	}

	.feedbacks__desc {
			background-color: #303030;
			color: #fff;
			border: none;
			text-align: center;
			font-size: 18px;
			font-weight: 300;
			padding: 0 40px;
	}

	.feedbacks__desc {
			text-align: center;
	}

	.feedbacks__desc p {
			margin: 30px 0;
	}
</style>