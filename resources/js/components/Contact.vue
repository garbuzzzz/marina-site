<template>
<div id="contacts" class="contact">
  <div class="cont">
    <div class="row from-db">
      {{ contacts }}
  		<div class="col-sm-6">
				<!-- здесь было пробное сообщение при валидации полностью на фронте -->
				<div class="try-frontend-validation">{{  }}</div>
				<!-- сюда приходит сообщение после отправки формы -->
  		  <div v-if="status" class='alert alert-success'>
  		    {{ status }}
  		  </div>
  		  <div v-if="Object.keys(this.errors).length" class='alert alert-danger'>
					<p>В форме есть ошибки:</p>
  		    <ul>
  		    	<li v-for="(error, index) in errors" :key="index">
							{{error[0]}}.
						</li>
  		    </ul>
  		  </div>
  		  <div class="contact__form">
					<div class="contact__form-subtitle">
						<h5>Напишите мне письмо)</h5>
					</div>
					<!-- в файле welcome есть пустой div с #validation     -->
          <form action="#validation" method="POST">
						<input type="hidden" name="_token" :value="token">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
											<!-- в поле инпута :class узнается есть ли ошибка вообще, а после инпута в дивах через if показывается именно текст для каждого типа ошибки -->
    									<input
												type="text"
												name="name"
												class="form-control"
												:class="{'is-invalid' : $v.name.$error}"
												placeholder="Имя"
												v-model="name"
												@blur="$v.name.$touch()"
											>
											<div v-if="!$v.name.required" class="invalid-feedback">
												Поле не может быть пустым.
											</div>
											<div v-if="!$v.name.maxLength" class="invalid-feedback">
												Поле не может быть длиннее {{ $v.name.$params.maxLength.max }} символов. Сейчас - {{ name.length }} символов. 
											</div>
                    </div>
                </div>                                    
                <div class="col-md-6">
                  <div class="form-group">
										<input type="email"
											name="email"
											class="form-control"
											:class="{'is-invalid' : $v.email.$error}"
											placeholder="Email"
											v-model="email"
											@blur="$v.email.$touch()"
										>																	
										<div v-if="!$v.email.required" class="invalid-feedback">
											Поле не может быть пустым.
										</div>
										<!-- причем поле email true в том случае, если required false. Это хорошо, то есть не показывает две ошибки типа поле пустое, и email не email, а показывает просто поле пустое. -->
										<div v-if="!$v.email.email" class="invalid-feedback">
											Пожалуйста, введите корректный email.
										</div>					
                  </div>
              	</div>
          		</div>
              <div class="form-group">
                <input
									type="text"
									name="subject"
									class="form-control"
									:class="{'is-invalid' : $v.subject.$error}"
									v-model="subject"
									placeholder="Тема"
									@blur="$v.subject.$touch()"
								>
								<div v-if="!$v.subject.required" class="invalid-feedback">
									Поле не может быть пустым.
								</div>
								<div v-if="!$v.subject.maxLength" class="invalid-feedback">
									Поле не может быть длиннее {{ $v.subject.$params.maxLength.max }} символов. Сейчас - {{ subject.length }} символов. 
								</div>
              </div>        
              <div class="form-group">
                <textarea
									name="message"
									class="form-control"
									:class="{'is-invalid' : $v.message.$error}"
									rows="9"
									placeholder="Сообщение"
									@blur="$v.message.$touch()"
									v-model="message"								
								></textarea>
								<div v-if="!$v.message.required" class="invalid-feedback">
									Поле не может быть пустым.
								</div>
              </div>
							<!-- $v.$invalid - тут лежит булевое значение, валидная форма в целом или нет -->
              <input
								type="submit"
								value="Отправить"
								:class="{'isdisabled' : $v.$invalid, 'contact__btn' : !$v.$invalid}"
								:disabled="$v.$invalid"
							>
            </form>
          </div>
      	</div>
  		</div>
    </div>
  </div>        
</template>
<script>
// нужно подключить, какие именно валидации нам нужно
import { required, maxLength, email } from 'vuelidate/lib/validators'
export default {
	props: ['token', 'status', 'errorsjson'],
	data() {
		return {
			errors: [],
			name: '',
			email: '',
			subject: '',
			message: '',
			isFormValid: false,
		}
	},
	methods: {
		// этот метод - только для того, чтобы проверить валидацию на фронте. Суть: есть вообще два варианта валидации: на сервере, который был до этого, и на фронте. Если на сервере, то после нажатия кнопки отправки формы запрос идет на сервер, там отправляется письмо, и если есть ошибки - они приходят на фронт как ошибки валидации или как сессия с успешным сообщением (смотри контроллер и welcome). если же делаем валидацию на фронтэнде, то здесь тоже два варианта: либо делать ее на фронте только, тогда при blur инпута валидируется инпут, а кнопка отправки disabled, если хоть какой-то из инпутов невалидный. Валидные все - обычная валидация на сервере. Можно сделать валидацию полностью на фронте, смысл в том, что страница не будет перезагружаться вообще, отменяется дефолтное поведение кнопки отправки, вместо него пишется фукнция, которая делает асинхронный пост запрос на адрес (я не делал api маршрут, но думаю смысл будет тот же, возможно не покажется dump, сделанный на сервере, но суть та же), на сервере этот запрос обрабатывается как надо, и если все ок, то отправляется обратно просто текст, он принимается в методе then после axios, и дальше можно положить его в нужное место шаблона. Если же в коде на сервере какая-то ошибка, то тут как я понял есть два варианта: ошибка, которая убивает скрипт, и ошибка, типа переменная не найдена. Короче, в каких-то случаях мне приходила страница ошибки ларавел, страшная красная непонятная для юзера, в каких-то - возвращалась нормальная страница и только в консоли, мол, сервер ответил со статусом такая-то ошибка. Еще: Пример отправки post через axios есть ниже, притом мы передаем просто объект. И если этот объект $request вывести в ларе через dd, то во-первых мы ничего не увидим, потому что остаемся на своей станице на фронте, а во вторых, если с сервера возвращать этот же объект на фронт, то он будет не такой сложный, как объект $request при распечатке на ларе, а будет простой наш js объект, и не важно, что именно отправлять с сервера на фронт: $request или $request->all()
		onSubmit() {
// чтобы он работал, надо прописать @submit.prevent="onSubmit" в тэге формы. 
			axios.post('/asdf', {'name': this.name, 'email': this.email, 'subject': this.subject, 'message': this.message})
			.then(response => {
				$('.try-frontend-validation')[0].innerText = response.data.message
				console.log(response);
			})
			.catch(err => {
				$('.asdf')[0].innerText = err.message
			})
			}
		},
	// как работает эта vuelidate: для начала надо ее установить через npm и подключить в app.js. далее можно пользоваться ей во vue instans, например здесь. Как пользоваться: в inpute создаем по событию (смотри что создаем), там обращаемся к имени валидации и вызываем метод touch. Для этого этот input должен быть привязан через v-model (да, обязтельно), а также должно быть поле validations, где и прописаны имена валидаций и то, какие именно валидации они делают. А сами эти валидации надо дополнительно подключить в скрипте, здесь же. 
	validations: {
		name: {
			required,	
			maxLength: maxLength(40),	
		},
		email: {
			required, 
			email
		},
		subject: {
			required,
			maxLength: maxLength(150),
		},
		message: {
			required,
		}
	},
	mounted() {
		// приняли json, распарсили, убрали индексы, а значения положили в нормальную свою переменную. и по ней уже проходимся циклом. 
		this.errors = Object.values(JSON.parse(this.errorsjson))
	},
	computed: {
		contacts() {
			this.$store.getters.titles.filter(t => {
				if(t.alias === '#contacts') {
					document.querySelector('.from-db')
						.insertAdjacentHTML('afterbegin', t.text)
				}
			})
		}
	},
}
</script>
<style lang="scss">
.contact {
    position: relative;
    padding: 70px 0;
		background-color: #fff;
		@media (max-width: 768px) {
			padding: 40px 0;
		}
		@media (max-width: 575px) {
			padding: 20px 0;
		}
}
.contact__address,
.contact__social {
	@media (max-width: 575px) {
		position: relative;
		left: 25%;
	}
	@media (max-width: 470px) {
		position: relative;
		left: 20%;
	}
	@media (max-width: 420px) {
		position: relative;
		left: 15%;
	}
	@media (max-width: 379px) {
		position: relative;
		left: 12%;
	}
}
.contact__form-subtitle {	
	color: #303030;
	margin-bottom: 15px;
	& h5 {
		font-size: 20px;
		@media (max-width: 575px) {
			text-align: center;
		}
	}
}
.contact:before { // сделано шикарно: это только задает фон. если сделать after, то фон закроет контент! так - нет. 
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background-color: #f8f8f8;
		border-left: 1px solid #e9e9e9;
		@media (max-width: 575px) {
			display: none;
		}
}
.contact__address {
	& h2 {
		position: relative;
    margin: 0 0 30px;
    font-weight: 700;
    padding-bottom: 21px;
		font-size: 26px;
		&:before,	&:after {
			content: "";
			position: absolute;
			left: 0;
		}
		&:before {
			bottom: 0;
			width: 100px;
			padding: 4.5px 0 4.5px;
			border-style: solid;
			border-width: 1px 0;
			border-color: #737373;
		}
		&:after {
			bottom: 5px;
			width: 200px;
			height: 1px;
			background-color: #303030;
		}
	}
	& address {
		margin-bottom: 0;
		& p {
			margin-bottom: 30px;
			&:last-child {
				margin-bottom: 0;
			}
			& i.fa {
				font-size: 20px;
				border: 1px solid #303030;
				width: 35px;
				padding: 5px 0;
				margin-right: 10px;
				text-align: center;
			}
		}
	}
}

.contact__social {
    margin-top: 12px;
}

.contact__social ul {
    margin: 0;
    padding: 0;
    list-style: none;
    font-size: 0;
}

.contact__social li {
    display: inline-block;
    margin-right: 5px;
}

.contact__social li a {
    display: block;
    width: 35px;
    margin: 18px 0;
    padding: 6px 0;
    color: #303030;
    border: 1px solid #303030;
    font-size: 14px;
    text-align: center;
    -webkit-transition: color .25s ease, background-color .25s ease-in-out, border-color .25s ease;
            transition: color .25s ease, background-color .25s ease-in-out, border-color .25s ease;
}

.contact__social li a:hover,
.contact__social li a:focus {
    color: #fff;
    border: 1px solid #303030;
    background: #303030;
}

.contact__form {
		padding-left: 50px;
		@media (max-width: 575px) {
			position: relative;
			left: -5%;
		}
}
.contact__form form input.form-control {
    border-color: #e9e9e9;
    border-radius: 0;
    box-shadow: none;
}

.contact__form form textarea.form-control {
    border-color: #e9e9e9;
    border-radius: 0;
    box-shadow: none;
    resize: none;
    margin-top: 15px;
}
	.contact__btn {
		color: #fff;
		background-color: #303030;
		font-size: 18px;
		font-weight: bold;
		padding: 10px 20px;
		margin-bottom: 10px;
		border-radius: 2px;
		transition: all 0.5s ease;
	}

	.contact__btn:hover {
		cursor: pointer;
		box-shadow: 0 0 5px #303030;
	}
.isdisabled {
	border-radius: 2px;
	color: #fff;
	padding: 3px 8px;
	margin-bottom: 10px;
	cursor: default;
	background: #BEBCB9;
	box-shadow: none;
	font-size: 18px;
	font-weight: bold;
	transition: all 0.5s ease;
}
</style>