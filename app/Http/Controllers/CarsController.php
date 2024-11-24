<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CarsController extends Controller
{
	public function show($id)
	{
			$params = Session::get('cars_list_params', []);
	
			// Добавляем параметры времени и промокода
			$response = Http::get('https://new.mycarrental.ru/api/v2/search_cars', array_merge($params, [
					'from-time' => '12:00',
					'to-time' => '12:00',
					'promocode' => 'null',
			]));
	
			if ($response->successful()) {
					$cars = $response->json()['vehicles'] ?? [];
					$car = collect($cars)->firstWhere('id', $id);
	
					if ($car) {
							return view('cars.show', compact('car'));
					}
	
					return abort(404, 'Автомобиль не найден');
			}
	
			return abort(500, 'Ошибка при получении данных из API');
	}
	
}
