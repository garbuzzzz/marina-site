<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use \App\Feedback;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
			if($request->isMethod('post')) {
				// чтобы при перезагрузке не создавалась еще одна запись - делаем такой метод. 
				$feedback = Feedback::firstOrCreate(
				[
					'text' => $request['text'],
				],
				[
					'author' => $request['author'],
					'position' => $request['position'],
					'description' => $request['description'],
					'text' => $request['text'],
					'image_little' => $request['image_little'],
					'image' => $request['image'],
				]);
				// сохраним в переменную МАССИВ фильтров, который пришел с фронта
				$filters = explode(",", $request['filters']);
				// в метод attach нужно передать либо просто число, либо массив чисел - это id тех фильтров, которые мы хотим положить в таблицу связи. Т.о, мы кладем в таблицу связи связь данного отзыва с переданными в метод номерами фильтров.
				// проверяем ифом, есть ли уже соответствие для этого отзыва, или нет, чтобы не было повторов. Для этого распечатал $feedback->filters() и посмотрел, что там метод exist меняет свое значение. 
				if(!$feedback->filters()->exists()) {
					$feedback->filters()->attach($filters);
				}			
				$request->session()->flash('addStatus', 'Данные успешно добавлены!');
			}
			$token = Session::token();
      return view('admin', ['token' => $token]);
		}
}
