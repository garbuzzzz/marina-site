<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Админка</title>
		<!-- я не особо понял, почему тут надо было прописать asset... и почему внизу, в скриптах, тоже надо было писать, но только когда обновляешь страницу about/banner, просто about - работало, и по переходу на banner ссылку работало, а вот по обновлению banner - нет.  -->
<link rel="stylesheet" href="{{ asset("css/admin/960.css") }}" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="{{ asset("css/admin/template.css") }}" type="text/css" media="screen" charset="utf-8" />		<link rel="stylesheet" href="{{ asset("css/admin/colour.css") }}" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="{{ mix('css/admin/admin.css') }}" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		<div id="admin">
			<header>
				<h1 id="head">Панель Администратора</h1>
				<ul id="navigation">
					<li><router-link to="/admin">Админка</router-link></li>
					<li><router-link to="/admin/banner">Баннер сайта</router-link></li>
					<li><router-link to="/admin/about">Обо мне</router-link></li>
					<li><router-link to="/admin/services">Услуги</router-link></li>					
					<li><router-link to="/admin/feedbacks">Отзывы</router-link></li>
					<li><router-link to="/admin/contacts">Контакты</router-link></li>
				</ul>
			</header>

			<!-- просто в роутер вью передаем переменую, и она будет доступна в любом маршруте, не надо ничего писать в файле маршрутов! Как-то раньше мне понадобилось писать свойство props: true в файле маршрутов, но это наверно касалось отдельного маршрута, я толком не помню. -->
			<router-view
				:token="'{{ $token }}'"
				:add="'{{ session('addStatus') }}'"				
			></router-view>
			
			<footer>
			<div id="foot">
				<i>Дизайн украден Гарбузом Павлом.</i><a href="https://vk.com/id565997227">Harbuz Pavel</a>
			</div>
			</footer>
		</div>

		<script src="{{ asset("js/jquery.min.js") }}"></script>
		<script src="{{ asset("js/admin.js") }}"></script>
	</body>
</html>
