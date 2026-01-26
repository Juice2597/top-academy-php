@extends('layouts.main')

@section('title', 'Все посты')

@section('content')
    <h2>Все Посты</h2>
    @forelse($posts as $post)
        <div>
            <a href="{{ route('posts.show', $post->id) }}">
                {{ $post->title }}
            </a>
        </div>
    @empty
        Нет постов
    @endforelse

@endsection
