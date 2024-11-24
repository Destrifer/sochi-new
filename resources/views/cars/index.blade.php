@extends('main')
@section('content')
    <h1>Список машин</h1>
    <x-cars-list from-id="10" to-id="10" from-date="25.11.2024" to-date="02.12.2024" per-page="50" />
@endsection
