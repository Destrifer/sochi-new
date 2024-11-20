@extends('main')
@section('title', $page->title)
@section('description', $page->description)
@section('content')
<div class="container page">
    <article>{!! $page->text !!}</article>
</div>
@endsection