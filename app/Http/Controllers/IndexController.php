<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Title;
use \App\Feedback;
use \App\Filter;
use Session;

class IndexController extends Controller
{
		public function execute(Request $request)
    {
        if($request->isMethod('post')) {
            $rules = [
                'Имя' => 'required|max:40',
                'Email' => 'required|email',
                'Тема' => 'required|max:150',
                'Сообщение' => 'required',
            ];

            $messages = [
                'required' => 'Поле ":attribute" обязательно к заполнению',
                'email' => 'Введите правильный email',
                'max' => 'Слишком длинное значение для поля ":attribute"',
            ];

            $this->validate($request, $rules, $messages);
            $data = $request->all();

           Mail::send('mailLayout', ['data' => $data], function($message) use ($data) {
                $message->from($data['Email'], $data['Имя']);
                $message->to('garbuz.pb@yandex.ru')->subject($data['Тема']);
            });
          $request->session()->flash('mailStatus', 'Ваше письмо успешно отправлено!');
//         return back()->with('mailStatus', 'Ваше письмо успешно отправлено!');
				}
				
				$token = Session::token();
        return view('welcome', ['token' => $token]);
		}

		// примерно так должна работать валидация на фронте. То есть сюда прилетает асинхронный запрос axios, и здесь идет просто отправка письма, и обратно улетает строка успешно. Но так как я удалил случайно этот файл, написал это уже по памяти, не факт что будет рабоать. 
		// public function asdf(Request $request) {
		// 	$data = $request->all();
		// 	Mail::send('mailLayout', ['data' => $data], function($message) use ($data) {
		// 		$message->from($data['Email'], $data['Имя']);
		// 		$message->to('garbuz.pb@yandex.ru')->subject($data['Тема']);
		// 	});
		// 	return view('welcome', ['message' => 'Ваше письмо успешно отправлено!!!!!!!!!']);
		// }

		public function updateSection(Request $request) {
			$section = Title::find($request['id']);
			$section->name = $request['name'];
			$section->text = $request['text'];
			$section->image = $request['image'];
			$section->save();
			return 'Данные успешно обновлены.';	
		}

		public function updateFeedback(Request $request) {
			$feedback = Feedback::find($request['id']);
			$feedback->author = $request['author'];
			$feedback->position = $request['position'];
			$feedback->description = $request['description'];
			$feedback->text = $request['text'];
			$feedback->image_little = $request['image_little'];
			$feedback->image = $request['image'];

			$filters = $request['filters'];
			// Суть проблемы была в том, что кроме изменения в таблице отзывов, нам нужно изменить таблицу связи отзывы-фильтры, это третья таблица просто с цифрами. Таблицы изначально связаны в моделях связью многие ко многим. Для этого мы: достаем фильтры, используя метод из таблицы $feedback->filters, перебираем эти фильтры, это же массив, причем нам нужен индекс массива - $i. Далее, pivot - это именно отсылка на ТАБЛИЦУ СВЯЗИ! Вот так вот, да! Мы меняем значение в ее ячейке данными, которые пришли из формы. 
			foreach($feedback->filters as $i => $filter) {
				$filter->pivot->filter_id = $filters[$i];
			}
			// и дальше просто сохраняем наши ОТЗЫВЫ. Все связи сохранятся автоматически.!!!
			$feedback->save();
			return "Данные успешно обновлены!";	
		}

		public function deleteFeedback(Request $request) {
			$feedback = Feedback::find($request['id']);
			// удаляет все, что связано с этим отзывом, в таблице связи. 
			$feedback->filters()->detach();
			// удаляет собственно сам отзыв
			$feedback->delete();
			return 'Данные успешно удалены';	
		}
}
