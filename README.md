Это spa. Вверху навбар, приклеенный при движении, который видоизменяется, если скролл прокручен. на главной странице баннер, баннером может быть видео в том числе. По нажатию на кнопку заказ открывается модальное окно. Есть секция feedbacks, где реализована сортировка отзывов по фильтрам. Сами отзывы (автор, описание и прочее) находятся в БД, фильтры тоже в БД, сделана таблица связи, то есть при изменении БД на сайте все обновится автоматически. Сортировка сделана через isotope библиотеку, анимирует все это дело. Каждый отзыв можно открыть в модальном окне. Сделано автоматическое изменение активной ссылки в навбаре в зависимости от того, на какой секции находимся; сделана плавное анимированное перемещение по нажатию на ссылку на секцию; сделана кнопка наверх аналогично. Для всего этого подключены и настроены библиотеки. Кстати, весь такой js код лежит в js/main.js, а само vue приложение запускается в app.js. Есть секция с отправкой письма владельцу сайта, все подключено, письма на локалке отправляются и доходят. Реализована валидация на клиенте, на сервере, с или без перезагрузки страницы - извращался как мог. 
Реализована админка. В админке можно просматривать статическую часть кода секции, редактировать. По секции feedbacks можно менять фильтры и все прочее, создавать новые, удалять. Все сделано без перезагрузки страницы, кроме добавления новой. Вообще, делал по-разному специально. 
На все ушло месяц-месяца полтора в среднем режиме работы. Тут еще бэкэнд, всякие там роуты, котроллеры, модели, автоматическое заполнение БД миграциями и посевами данных, всякое такое. При условии, что шаблон вместе со встроенными js-библиотеками был скачан, но весь код я переписывал с нуля под vue компоненты, выбрасывал все, что непонятно, что понятно - видоизменял и переписывал руками.
