@extends('layouts.main')

@section('title', 'Все категории')

@section('content')
    <h2>Все Категории</h2>
    @forelse($categories as $category)
        <div>
            <a href="{{ route('posts.categories.show', $category) }}">
                {{ $category->name }}
            </a>
        </div>
    @empty
        Нет категорий
    @endforelse

@endsection
