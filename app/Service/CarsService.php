<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class CarsService
{
    protected $baseUrl = 'https://new.mycarrental.ru/api/v2/search_cars';

		public function getCars(array $params = [])
{
    $currentDate = now();

    // Устанавливаем начальную и конечную даты
    $defaultFromDate = $currentDate->addDays(3)->format('d.m.Y');
    $defaultToDate = $currentDate->copy()->addDays(8)->format('d.m.Y'); // Разница 5 дней

    $queryParams = array_merge([
        'from-id' => 10,
        'to-id' => 10,
        'from-date' => $defaultFromDate,
        'to-date' => $defaultToDate,
        'from-time' => '12:00',
        'to-time' => '12:00',
        'promocode' => 'null',
        'per_page' => 100,
    ], $params);

    $queryString = http_build_query($queryParams, '', '&', PHP_QUERY_RFC3986);

    $url = $this->baseUrl . '?' . $queryString;

    // Выполняем запрос
    $response = Http::get($url);

    // Проверяем статус ответа
    if ($response->successful()) {
        return $response->json(); // Возвращаем данные как массив
    }

    throw new \Exception('Не удалось получить данные с API');
}


}
