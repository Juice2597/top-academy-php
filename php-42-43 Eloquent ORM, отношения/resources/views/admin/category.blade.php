@extends('layouts.admin')

@section('title', 'Категории')

@section('content')
    <h2>Категории</h2>
    <div>
        @foreach($categories as $category)
            <div> {{ $category->name }}</div>
        @endforeach
    </div>
@endsection
