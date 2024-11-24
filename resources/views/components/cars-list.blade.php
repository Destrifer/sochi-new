@if (isset($cars['vehicles']) && count($cars['vehicles']) > 0)
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
