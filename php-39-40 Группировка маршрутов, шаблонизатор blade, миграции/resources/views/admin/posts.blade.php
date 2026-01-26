@extends('admin.layouts.main')

@section('title', 'Админка посты')

@section('content')

    <h2>Все посты</h2>
    <?php foreach ($posts as $post): ?>
    <div>

            <?= $post->title ?>

    </div>
    <?php endforeach; ?>

@endsection

