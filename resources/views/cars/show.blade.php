@extends('main')

@section('content')
    <h1>{{ $car['model'] }} ({{ $car['year'] }})</h1>

    @if (isset($car['images'][0]['image']))
        <img src="{{ $car['images'][0]['image'] }}" alt="{{ $car['model'] }}" class="car-image">
    @else
        <p>Изображение не доступно</p>
    @endif

    <p><strong>Цена за день:</strong> {{ $car['rate_per_day'] }} {{ $car['currency']['short_title'] }}</p>
    <p><strong>Цвет:</strong> {{ $car['color'] }}</p>
    <p><strong>Трансмиссия:</strong> {{ $car['transmission'] }}</p>
    <p><strong>Двигатель:</strong> {{ $car['engine_capacity'] }}L, {{ $car['engine_hp'] }} HP</p>
    <p><strong>Тип топлива:</strong> {{ $car['engine_type'] }}</p>
    <p><strong>Класс:</strong> {{ $car['class_id'] }}</p>
@endsection
