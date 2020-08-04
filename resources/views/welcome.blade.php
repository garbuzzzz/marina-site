<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marina</title>
        <!-- Fonts -->
				<!-- фонты если что подключены в app.scss, как и бутстрап! -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
				<link href="{{ mix('css/app.css') }}" rel="stylesheet">
				<link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
				<link rel="stylesheet" href="{{ asset('css/font-awesome-4.7.0/fa-viber.css') }}">
    </head>
    <body>
        <div id="app" class="wrapper">
					<div class="page">
						<navbar></navbar>
						<banner></banner>
						<about></about>
						<services></services>
						<feedbacks></feedbacks>
						<counter></counter>
						<!-- Внутри двунарных кавычек пишем на пхп, так как находимся в blade.  -->
						<div id="validation"></div>
						<contact
							:token="'{{ $token }}'"
							:status="'{{ session('mailStatus') }}'"
							:errorsjson="'{{ $errors }}'"
						></contact>
						<subscribe></subscribe>	
						<scroll></scroll>	
					</div>
        </div>
			<!-- ==== jQuery ==== -->
			<script src="js/jquery.min.js"></script>
			<!-- ==== Animate Scroll Plugin ==== -->
			<script src="js/animatescroll.min.js"></script>
			<!-- Видео!!!-->
			<script src="js/jquery.vide.js"></script>
			<!-- ==== Isotope Plugin ==== -->
			<script src="js/isotope-docs.min.js"></script>
			<!-- ==== Main Script ==== -->
			<script src="js/app.js"></script>			
    </body>
</html>
