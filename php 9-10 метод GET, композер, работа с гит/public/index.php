<?php

include __DIR__ . '/../vendor/autoload.php';

$page = $_GET['page'] ?? 'index';

switch ($page) {
    case 'index':
        include __DIR__ . '/../views/index.phtml';
        break;

    case 'posts':
        $posts = getPosts();
        include __DIR__ . '/../views/posts/posts.phtml';
        break;

    case 'post':
        $id = $_GET['id'] ?? 0;
        $post = getPost($id);

        include __DIR__ . '/../views/posts/post.phtml';
        break;

    case 'about':
        include __DIR__ . '/../views/about.phtml';
        break;

    case 'contact':
        include __DIR__ . '/../views/contact.phtml';
        break;

    case 'category':
        $id = $_GET['id'] ?? 0;
        $posts = getPostCategories($id);
        include __DIR__ . '/../views/posts/category.phtml';
        break;

    case 'categories':
        $arrayCategories = getCategories();
        include __DIR__ . '/../views/posts/categories.phtml';
        break;

    default:
        die("Нет такой страницы");
}




