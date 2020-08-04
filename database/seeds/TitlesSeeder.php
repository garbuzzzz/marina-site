<?php

use Illuminate\Database\Seeder;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
		public function run()
		// composer dump-autoload, если не видит класс после команды запуска посева
    {
        DB::table('titles')->insert([
					[
						'name' => 'ГЛАВНАЯ',
						'alias' => '#banner',
						'text' => '
							<div class="banner-content">
								<div class="banner-content__row">
									<div class="banner-content__title">
										<h2>Привет!</h2>
									</div>
									<div class="banner-text">
										<h4>Я - Марина Гарбуз-Нехай, хорошая девочка. Умею сделать ваш бизнес.</h4>
										<a href="">Поговорим об этом?</a>
									</div>
								</div>
							</div>
						',
						'image' => '/img/test.jpg'
					],
					[
						'name' => 'ОБО МНЕ',
						'alias' => '#about',
						'text' => '
						<div class="cont">
						<div class="title about__title">
							<h2><b>ABOUT ME</b></h2>
						</div>
						<div class="about__row">
							<div class="about__column">
								<div class="about__description">
									<div class="about__subtitle subtitle"><p>WHO <b>AM I?</b></p></div>
									<div class="about__text">
										<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos quod aperiam odit, non expedita iste laudantium blanditiis modi accusantium nihil numquam beatae impedit soluta, temporibus quaerat doloremque facilis cum totam.</p>
										<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos quod aperiam odit, non expedita iste laudantium blanditiis modi accusantium nihil numquam beatae impedit soluta, temporibus quaerat doloremque facilis cum totam.</p>
									</div>
								</div>
							</div>
							<div class="about__column">
								<div class="about__description">
									<div class="about__subtitle subtitle"><p>EXPERT <b>IN</b></p></div>
									<div class="about__text">
										<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos quod aperiam odit, non expedita iste laudantium blanditiis modi accusantium nihil numquam beatae impedit soluta, temporibus quaerat doloremque facilis cum totam.</p>
									</div>
									<div class="about__progress-bar">
										<div class="about--progress-items">
											<h5>JAVASCRIPT</h5>
											<div class="progress" style="height: 15px;">
												<div class="progress-bar bg-dark" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">60%</div>
											</div>
											
											<h5>WEB DESIGN</h5>
											<div class="progress" style="height: 15px;">
												<div class="progress-bar bg-dark" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">90%</div>
											</div>
											<h5>WORDPRESS</h5>
											<div class="progress" style="height: 15px;">
												<div class="progress-bar bg-dark" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="about__column">
								<div class="about__card">
									<div class="about__subtitle subtitle"><p><b>EDU</b>CATION</p></div>
									<div class="about__card-row">
										<div class="about__card-item">
											<div class="about__education-item">2005-2007</div>
											<div class="about__specializ-item">
												<h4>GRAPHIC DESIGN</h4>
												<p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, obcaecati?</p>
												<hr>
											</div>
										</div>
										<div class="about__card-item">
											<div class="about__education-item">2005-2007</div>
											<div class="about__specializ-item">
												<h4>WEB DESIGN</h4>
												<p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, obcaecati?</p>
												<hr>
											</div>
										</div>
										<div class="about__card-item">
											<div class="about__education-item">2009-2011</div>
											<div class="about__specializ-item">
												<h4>WEB DEVELOPMENT</h4>
												<p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, dignissimos.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
				
							<div class="about__column">
								<div class="about__card">
									<div class="about__subtitle subtitle"><p><b>EDU</b>CATION</p></div>
									<div class="about__card-row">
										<div class="about__card-item">
											<div class="about__education-item">2005-2007</div>
											<div class="about__specializ-item">
												<h4>GRAPHIC DESIGN</h4>
												<p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, obcaecati?</p>
												<hr>
											</div>
										</div>
										<div class="about__card-item">
											<div class="about__education-item">2005-2007</div>
											<div class="about__specializ-item">
												<h4>WEB DESIGN</h4>
												<p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aspernatur, obcaecati?</p>
												<hr>
											</div>
										</div>
										<div class="about__card-item">
											<div class="about__education-item">2009-2011</div>
											<div class="about__specializ-item">
												<h4>WEB DEVELOPMENT</h4>
												<p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, dignissimos.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						',
						'image' => ''
					],
					[
						'name' => 'УСЛУГИ',
						'alias' => '#services',
						'text' => '
						<div class="cont">
						<div class="title services__title">
							<h2><b>ЧТО Я УМЕЮ</b></h2> 
						</div>
						<div class="services__row">
							<div class="services__column">			
								<div class="services__item">
									<div class="services__icon">
										<i class="fa fa-object-group"></i>
									</div>				
									<div class="services__body">
										<div class="services__subtitle">
											<h3>WEB DESIGN & UI</h3>
										</div>
										<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non distinctio quo illo. Cupiditate, veritatis eveniet.</p>
									</div>
								</div>				
							</div>
							<div class="services__column">			
								<div class="services__item">
									<div class="services__icon">
										<i class="fa fa-object-group"></i>
									</div>				
									<div class="services__body">
										<div class="services__subtitle">
											<h3>WEB DESIGN & UI</h3>
										</div>
										<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non distinctio quo illo. Cupiditate, veritatis eveniet.</p>
									</div>
								</div>				
							</div>
							<div class="services__column">			
								<div class="services__item">
									<div class="services__icon">
										<i class="fa fa-object-group"></i>
									</div>				
									<div class="services__body">
										<div class="services__subtitle">
											<h3>WEB DESIGN & UI</h3>
										</div>
										<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non distinctio quo illo. Cupiditate, veritatis eveniet.</p>
									</div>
								</div>				
							</div>
							<div class="services__column">			
								<div class="services__item">
									<div class="services__icon">
										<i class="fa fa-object-group"></i>
									</div>				
									<div class="services__body">
										<div class="services__subtitle">
											<h3>WEB DESIGN & UI</h3>
										</div>
										<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non distinctio quo illo. Cupiditate, veritatis eveniet.</p>
									</div>
								</div>				
							</div>
							<div class="services__column">			
								<div class="services__item">
									<div class="services__icon">
										<i class="fa fa-object-group"></i>
									</div>				
									<div class="services__body">
										<div class="services__subtitle">
											<h3>WEB DESIGN & UI</h3>
										</div>
										<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non distinctio quo illo. Cupiditate, veritatis eveniet.</p>
									</div>
								</div>				
							</div>
							<div class="services__column">			
								<div class="services__item">
									<div class="services__icon">
										<i class="fa fa-object-group"></i>
									</div>				
									<div class="services__body">
										<div class="services__subtitle">
											<h3>WEB DESIGN & UI</h3>
										</div>
										<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Non distinctio quo illo. Cupiditate, veritatis eveniet.</p>
									</div>
								</div>				
							</div>
						</div>
					</div>
						',
						'image' => ''
					],
					[
						'name' => 'ОТЗЫВЫ',
						'alias' => '#feedbacks',
						'text' => '',
						'image' => ''
					],
					[
						'name' => 'КОНТАКТЫ',
						'alias' => '#contacts',
						'text' => '
						<div class="col-sm-6">
						<div class="contact__address">
								<h2>CONTACT ADDRESS</h2>
								
								<address>
										<p><i class="fa fa-home"></i>Biruzova street, 25-13, Minsk, Belarus</p>
										<p><i class="fa fa-envelope"></i>marina.nehaya@gmail.com</p>
										<p><i class="fa fa-phone"></i>+375 33 631 44 31</p>
								</address>
						</div>
						<div class="contact__social">
								<ul>
										<li><a href="https://vk.com/garbuz_mari"><i class="fa fa-vk"></i></a></li>
										<li><a href="https://www.instagram.com/marina.smm_"><i class="fa fa-instagram"></i></a></li>
										<li><a href="#"><i class="fa fa-telegram"></i></a></li>
										<li><a href="#"><i class="fa fa-viber"></i></a></li>
								</ul>
						</div>
</div>
						',
						'image' => ''
					],
				]);
    }
}
