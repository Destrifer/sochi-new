<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Http;
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
    }

    public function render()
    {
        $response = Http::get('https://new.mycarrental.ru/api/v2/search_cars', [
            'from-id' => $this->fromId,
            'to-id' => $this->toId,
            'from-date' => $this->fromDate,
            'to-date' => $this->toDate,
            'from-time' => '12:00',
            'to-time' => '12:00',
            'promocode' => 'null',
            'per_page' => $this->perPage,
        ]);

        $cars = $response->successful() ? $response->json() : ['vehicles' => []];

        return view('components.cars-list', ['cars' => $cars]);
    }
}
