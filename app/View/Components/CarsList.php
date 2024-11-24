<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class CarsList extends Component
{
    public $fromId;
    public $toId;
    public $fromDate;
    public $toDate;
    public $perPage;

    public function __construct($fromId, $toId, $fromDate, $toDate, $perPage = 10)
    {
        $this->fromId = $fromId;
        $this->toId = $toId;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->perPage = $perPage;

        // Сохраняем параметры в сессию
        Session::put('cars_list_params', [
            'from-id' => $this->fromId,
            'to-id' => $this->toId,
            'from-date' => $this->fromDate,
            'to-date' => $this->toDate,
            'per_page' => $this->perPage,
        ]);
    }

    public function fetchCars()
    {
        // Добавляем параметры времени и промокода
        $response = Http::get('https://new.mycarrental.ru/api/v2/search_cars', [
            'from-id' => $this->fromId,
            'to-id' => $this->toId,
            'from-date' => $this->fromDate,
            'to-date' => $this->toDate,
            'from-time' => '12:00',   // Параметр времени
            'to-time' => '12:00',     // Параметр времени
            'promocode' => 'null',    // Параметр промокода
            'per_page' => $this->perPage,
        ]);

        return $response->successful() ? $response->json()['vehicles'] ?? [] : [];
    }

    public function render()
    {
        return view('components.cars-list', [
            'cars' => $this->fetchCars(),
        ]);
    }
}
