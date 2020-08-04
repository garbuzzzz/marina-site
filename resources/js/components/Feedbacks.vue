<template>
<div>
    <div id="feedbacks" class="feedbacks">											
      <div class="cont">
        <div class="title feedbacks__title">
          <h2><strong>ЛУЧШИЕ ОТЗЫВЫ</strong></h2>
        </div>
        <div class="feedbacks__filter-menu">					
          <ul>
            <li data-filter="*" class="active"><a href="*" class="feedbacks__btn">ВСЕ</a></li>
            <li
							:data-filter="`.${filter.class}`"
							v-for="filter in filters" :key="filter.id"
						>
							<a :href="filter.name" class="feedbacks__btn">{{ filter.name }}</a>
						</li>            
          </ul>
        </div>
        <div class="row feedbacks__items">
					<!-- выравнивание картинок сначала делал на флексах, НО НЕВОЗМОЖНО С ЭТИМ ИЗОТОПОМ СДЕЛАТЬ НА ФЛЕКСАХ. ПОЭТОМУ ОНИ ВЫРАВНИВАЮТСЯ - О ЧУДО! - СЕТКОЙ БУТСТРАПА!!! -->
          <div
						:class="`col-xs-12 col-sm-4 col-md-3 feedbacks__item${feedback.classes}`"
						v-for="(feedback, index) in feedbacks" :key="index"
					>
            <img :src="feedback.image_little" alt="" />
            <div class="overlay">
							<h2>{{ feedback.author }}</h2>
							<h4>{{ feedback.position }}</h4>                                    
							<p>{{ feedback.description }}</p>
							<a
								:href="'#details'+index"
								class="btn overlay__btn"
								data-toggle="modal"
							>
								Подробнее
							</a>
            	</div>
						</div>
          </div>
        </div>
      </div>
			<feedback-modal :feedbacks="feedbacks"></feedback-modal>
    </div>
		
</template>
<script>
import FeedbackModal from './FeedbackModal'
export default {
	components: {
		FeedbackModal,
	},
	data() {
		return {
		}
	},
	created() {
	},
	computed: {
		feedbacks() {
			return this.$store.getters.feedbacks.feedbacks
		},
		filters() {
			return this.$store.getters.feedbacks.filters
		},
	}
}
</script>
<style lang="scss">
.feedbacks {
	padding-bottom: 40px;
	@media (max-width: 576px) {
		padding-bottom: 15px;
	}
}
.feedbacks__title {
	@media (max-width: 570px) {
		margin-bottom: 25px;
	}
}
	
.feedbacks__filter-menu ul {
    margin: 0 0 20px;
    padding: 0;
    list-style: none;
    font-size: 0;
    line-height: 0;
		text-align: center;
		@media (max-width: 576px) {
			margin-bottom: 0;
		}
}

.feedbacks__filter-menu li {
    display: inline-block;
		margin: 0 5px 35px;
}

.feedbacks__filter-menu a {
    padding: 10px 15px;
    font-size: 14px;
		line-height: 18px;
    -webkit-transition: color .25s ease, background-color .25s ease-in-out;
		transition: color .25s ease, background-color .25s ease-in-out;
		font-size: bold;
}

.feedbacks__filter-menu a:hover,
.feedbacks__filter-menu li.active a {
    color: #fff;
    background-color: #303030;
}

.feedbacks__item {
    position: relative;
    margin-bottom: 0;
    padding: 15px;
    background-color: transparent;
    border: none;
		overflow: hidden;
}

.feedbacks__item img {
    width: 100%;
    height: auto;
}

.overlay {
    position: absolute;
    top: 15px;
    left: 15px;
    bottom: 15px;
    right: 15px;
    color: #fff;
    background: rgba(159, 156, 151, 0.8);
    padding: 15px;
    text-align: center;
    -webkit-transition: opacity .25s ease-in-out;
            transition: opacity .25s ease-in-out;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    overflow: hidden;
}

.feedbacks__item:hover .overlay {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}

.overlay h2 {
    margin-top: 0;
    font-size: 24px;
		font-weight: 700;
		@media (max-width: 992px) {
			font-size: 16px;
		}
		@media (max-width: 768px) {
			font-size: 20px;
		}
		@media (max-width: 680px) {
			font-size: 16px;
		}
}
.overlay h4 {    
		@media (max-width: 992px) {
			font-size: 12px;
		}
		@media (max-width: 768px) {
			font-size: 16px;
		}
		@media (max-width: 680px) {
			font-size: 14px;
		}
}
.overlay p {
    font-weight: 300;
		line-height: 24px;
		@media (max-width: 992px) {
			font-size: 11px;
			line-height: 14px;
		}
		@media (max-width: 768px) {
			font-size: 14px;
			line-height: 18px;
		}
		@media (max-width: 680px) {
			font-size: 12px;
			line-height: 14px;
		}
}

.overlay .overlay__btn {
    background: transparent;
    border: 1px solid #fff;
    font-weight: 500;
    border-radius: 0;
    outline: 0;
    color: white;
    -webkit-transition: .25s;
            transition: .25s;
    text-transform: uppercase;
}

.overlay .overlay__btn:hover,
.overlay .overlay__btn:focus {
    color: #fff;
    background-color: #303030;
		border-color: #303030;
		box-shadow: none;
}

	.feedbacks__btn {
		color: #303030;
		background-color: transparent;		
		border: 1px solid #303030;
		
	}

	.feedbacks__btn:hover,
	.feedbacks__btn:focus {
		text-decoration: none;
		color: #303030;
		box-shadow: none;
		outline: 0;
	}
</style>
