<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CarsController extends Controller
{
    public function index()
    {
        // Запрос к API
        $response = Http::get('https://new.mycarrental.ru/api/v2/search_cars', [
            'from-id' => 10,
            'to-id' => 10,
            'from-date' => '25.11.2024',
            'to-date' => '02.12.2024',
            'from-time' => '12:00',
            'to-time' => '12:00',
            'promocode' => 'null',
            'per_page' => 2, // Увеличьте лимит, чтобы отобразить больше автомобилей
        ]);

        // Проверка успешности запроса
        if ($response->successful()) {
            $cars = $response->json();
            return view('cars.index', ['cars' => $cars]);
        }

        return abort(500, 'Ошибка при получении данных из API');
    }

		public function show($id)
{
    // Запрос к API для получения всех машин
    $response = Http::get('https://new.mycarrental.ru/api/v2/search_cars', [
        'from-id' => 10,
        'to-id' => 10,
        'from-date' => '25.11.2024',
        'to-date' => '02.12.2024',
        'from-time' => '12:00',
        'to-time' => '12:00',
        'promocode' => 'null',
        'per_page' => 2,
    ]);

    if ($response->successful()) {
        $cars = $response->json();

        // Поиск автомобиля по ID
        $car = collect($cars['vehicles'])->firstWhere('id', $id);

        if ($car) {
            return view('cars.show', ['car' => $car]);
        }

        return abort(404, 'Автомобиль не найден');
    }

    return abort(500, 'Ошибка при получении данных из API');
}
}