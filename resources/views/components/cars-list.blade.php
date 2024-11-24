<!-- resources/views/components/cars-list.blade.php -->
@php
    // Логирование параметров запроса
    \Log::info('API Request Parameters:', [
        'from-id' => $fromId,
        'to-id' => $toId,
        'from-date' => $fromDate,
        'to-date' => $toDate,
        'from-time' => '12:00', // Параметр времени
        'to-time' => '12:00', // Параметр времени
        'promocode' => 'null', // Параметр промокода
        'per-page' => $perPage,
    ]);

    // Отправка запроса
    $response = Http::get('https://new.mycarrental.ru/api/v2/search_cars', [
        'from-id' => $fromId,
        'to-id' => $toId,
        'from-date' => $fromDate,
        'to-date' => $toDate,
        'from-time' => '12:00',
        'to-time' => '12:00',
        'promocode' => 'null',
        'per_page' => $perPage,
    ]);

    $cars = $response->successful() ? $response->json() : [];
@endphp

@if (!empty($cars['vehicles']))
    <div class="cars-list">
        @foreach ($cars['vehicles'] as $car)
            <div class="car-item">
                <h2>{{ $car['model'] }} ({{ $car['year'] }})</h2>
                <img src="{{ $car['images'][0]['thumbnail'] ?? '' }}" alt="{{ $car['model'] }}">
                <p>Цена за день: {{ $car['rate_per_day'] }} {{ $car['currency']['short_title'] }}</p>
                <a href="{{ route('cars.show', ['id' => $car['id']]) }}">Подробнее</a>
            </div>
        @endforeach
    </div>
@else
    <p>Нет доступных автомобилей.</p>
@endif
