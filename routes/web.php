<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::match(['get', 'post'],'/', ['uses' => 'IndexController@execute']);

// этот метод я использовал просто для того, чтобы протестировать валидацию на сервере без перезагрузки страницы. Все получилось, он оставлен просто как запасной вариант. 
// Route::match(['get', 'post'],'/asdf', ['uses' => 'IndexController@asdf']);

// по уму, это должно быть в TitlesController, но это resourse контроллер, как в нем сделать метод update - я не знаю, потому делаю костыль, и делаю в индекс контроллере. 
Route::post('/update-section', ['uses' => 'IndexController@updateSection']);
Route::post('/update-feedback', ['uses' => 'IndexController@updateFeedback']);
Route::post('/delete-feedback', ['uses' => 'IndexController@deleteFeedback']);
Route::post('/add-feedback', ['uses' => 'IndexController@addFeedback']);


Auth::routes();

// any нужен для того, чтобы лара пропускала любой маршрут, а дальше уже vue с ним разбирается. 
// понадобавлял этих any, иначе не переходит на длинные маршруты редактирования
Route::match(['get', 'post'], '/admin/{any?}/{anyt?}/{anyth?}', 'AdminController@index')->name('admin');

