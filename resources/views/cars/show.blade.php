@extends('main')
@section('content')
    <h1>{{ $car['model'] }} ({{ $car['year'] }})</h1>
    <img src="{{ $car['images'][0]['image'] ?? '' }}" alt="{{ $car['model'] }}">
    <p>Цена за день: {{ $car['rate_per_day'] }} {{ $car['currency']['short_title'] }}</p>
    <p>Цвет: {{ $car['color'] }}</p>
    <p>Трансмиссия: {{ $car['transmission'] }}</p>
    <p>Двигатель: {{ $car['engine_capacity'] }}L, {{ $car['engine_hp'] }} HP</p>
    <p>Тип топлива: {{ $car['engine_type'] }}</p>
    <p>Класс: {{ $car['class_id'] }}</p>
    <a href="{{ route('cars.index') }}">Вернуться к списку</a>
@endsection
