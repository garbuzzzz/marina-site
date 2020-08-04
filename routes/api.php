<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Title;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// так тоже работает!
// нужен префикс api!!!!!!!! для всех маршрутов из этого файла
// Route::get('/titles', function (Request $request) {
// 	$titles = Title::all();
// 	return response()->json($titles);
// });

// resource означает то, что используется контроллер типа ресурс, в нем метод index
// нужен префикс api!!!!!!!! для всех маршрутов из этого файла
Route::resource('titles', 'TitlesController');
// в этом контроллере будут из БД подтягиваться не только Feedbacks, но и Filters
Route::resource('feedbacks', 'FeedbacksController');

