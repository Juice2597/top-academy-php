@extends('layouts.main')

@section('title', 'Посты категории')

@section('content')
    <h2>Посты категории {{ $category->name}}</h2>
    @forelse($posts as $post)
        <div>
            <h3>Категория: {{ $post->category->name }}</h3>
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </div>
    @empty
        Нет постов
    @endforelse
@endsection
