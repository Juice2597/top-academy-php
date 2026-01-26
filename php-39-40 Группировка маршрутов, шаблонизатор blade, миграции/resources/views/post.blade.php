@extends('layouts.main')

@section('title', 'Пост')

@section('content')
    @isset($post)
        <h2>{{ $post->title }}</h2>
        <div>
            {{ $post->content }}
        </div>
    @else
        Нет такого поста
    @endisset
@endsection
