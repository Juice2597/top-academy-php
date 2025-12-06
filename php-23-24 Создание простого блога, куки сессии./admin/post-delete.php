<?php
session_start();
$posts = json_decode(file_get_contents('./../data/posts.json'), true);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'] ?? null;
    unset($posts[$id]);

    file_put_contents('./../data/posts.json', json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    header('Location: /admin/posts.php');
    die();
}

