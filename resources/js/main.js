;(function ($) {
	'use strict';

	/* -------------------------------------------
			Common Variables
	------------------------------------------- */
	var wn = {},
			$wn = $(window),
			$body = $('body');

$(function () { // строчка непонятная, без понимания как работает $ не разобрался
		// разобрался. она значит, что все это будет происходить только после того, как загрузится документ, то есть document.load
	// $(document).on('load', function() {
		// 
	// })
			/* -------------------------------------------
					Animate scroll
			------------------------------------------- */
			var $animateScrollLink = $('.AnimateScrollLink'), // ловим саму кнопку
					$animateScroll = $('.AnimateScroll'),
					animateScrolling = function () { // определяем фукнцию для этой кнопки, вызовем потом по клику
							var targetEl = $(this).attr('href'); // берем href этой кнопки, потому что она есть ссылка

							$(targetEl).animatescroll({ // вызываем функцию из-под капота библиотеки, в нее передаем параметры скролла
									// удивительно, что переходя на # элемента, в адресной строке не отображается этот id
									padding: 65,
									easing: 'easeInOutExpo',
									scrollSpeed: 900
							});

							return false;
					};
			$animateScrollLink.on('click', animateScrolling); // вызываем по клику на нашу кнопку нашу функцию
			$animateScroll.on('click', 'a', animateScrolling); // что здесь делает а - не понимаю. это надо знать $. но смысл в том, что по нажатию на ссылки навбара мы переходим с анимацией на них. 

			/* -------------------------------------------
					Counter up
			------------------------------------------- */
			// var $counterUp = $('.CounterUp');

			// if ( typeof $.fn.counterUp === "function" ) {
			// 		$counterUp.counterUp({
			// 				delay: 10,
			// 				time: 1000
			// 		});
			// }

		
			
			/* -------------------------------------------
					Contact Form
			------------------------------------------- */
			// var $contactForm = $('.contact--form form'),
			// 		$contactFormStatus = $('.contact-form-status');

			// if ( $contactForm.length ) {
			// 		$contactForm.validate({
			// 				rules: {
			// 						contactName: "required",
			// 						contactEmail: {
			// 								required: true,
			// 								email: true
			// 						},
			// 						contactSubject: "required",
			// 						contactMessage: "required"
			// 				},
			// 				messages: {
			// 						contactName: "Please enter your firstname",
			// 						contactEmail: "Please enter a valid email address",
			// 						contactSubject: "Please enter your phone number",
			// 						contactMessage: "Plase type your message"
			// 				},
			// 				submitHandler: function () {
			// 						var $curForm = $( this.currentForm );

			// 						$curForm.ajaxSubmit({
			// 								success: function (res) {
			// 										$contactFormStatus.show().html( res ).delay(3000).fadeOut('slow');
			// 								}
			// 						});
			// 				}
			// 		});
			// }
	});

	/* -------------------------------------------
			Cache window scrolltop postition
	------------------------------------------- */
	// var cacheScrollTop = function () {
	// 		wn.scrollTop = $wn.scrollTop();
	// };

	/* -------------------------------------------
			Set scroll status to body
	------------------------------------------- */
	var isBodyScrolled = function () {
		if (pageYOffset > 0) { // если прокручена страницы
			// добавим боди класс
			document.body.classList.add('scrolled');
		} else { // иначе снимем
			document.body.classList.remove('scrolled');
		} 
	};


	/* -------------------------------------------
			Gallery Filtering
	------------------------------------------- */
	var galleryFiltering = function () {
		var $feedbacks__items = $('.feedbacks__items')

		if ( $feedbacks__items.length ) {
			$('.gfeedbacks__items').isotope({
				itemSelector: '.feedbacks__item',
				layoutMode: 'fitRows'
			})
			$('.feedbacks__filter-menu ul li').click(function () {	
				$('.feedbacks__filter-menu ul li').removeClass('active');
				$(this).addClass('active');
			
				var selector = $(this).attr('data-filter')
				
				$('.feedbacks__items').isotope({
					filter: selector
				});
				return false;
			})
		}
	};

	/* -------------------------------------------
			Hide preloader
	------------------------------------------- */
	// var hidePreloader = function () {
	// 		$('#preloader').fadeOut('slow');
	// };

	/* -------------------------------------------
			Function Calls
	------------------------------------------- */
	$wn
			// .on('load scroll', cacheScrollTop)
			.on('load scroll', isBodyScrolled)
			.on('load', galleryFiltering)
			// .on('load resize', aboutProgressBars)
			// .on('load', hidePreloader);

})(jQuery);
