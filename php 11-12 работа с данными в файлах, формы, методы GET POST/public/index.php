<?php

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../config/app.php';

$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        echo render('index');
        break;
    case 'increment':
        echo render('calc', increment());
        break;
    case 'decrement':
        echo render('calc', decrement());
        break;
    case 'multiply':
        echo render('calc', multiply());
        break;
    case 'divide':
        echo render('calc', divide());
        break;
    case 'calculate':
        echo render('calculate', calculate());
        break;
    case 'add-post':
        echo render('add-post', addPost());
        break;
    case 'post-list';
        echo render('post-list');
        break;
    case 'category';
        $category = $_GET['id'];
        $posts = getPostCategories($category);
        echo render('category', [
            'posts' => $posts,
            'category' => $category,
        ]);
        break;
    case 'post-created':
        echo render('post-created', [
        ]);
        break;
    default:
        die('Page not found');
}