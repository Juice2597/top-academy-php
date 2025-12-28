<?php

$pdo = new PDO('sqlite:db.sqlite');

$posts = $pdo->query("select posts.id, posts.title from posts")->fetchAll();

$post = $pdo->query("SELECT posts.id, posts.title, posts.content, categories.name AS category_name, users.name AS user_name FROM posts JOIN categories ON posts.category_id = categories.id JOIN users ON posts.user_id = users.id LIMIT 1")->fetchAll();

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();

$category_post = $pdo->query("SELECT posts.title, posts.content FROM posts WHERE category_id = '2'")->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h2>Все посты, id и title</h2>
<?php foreach ($posts as $p) : ?>
    <h3>title: <?= htmlspecialchars($p['title']); ?></h3>
    <p>id: <?= htmlspecialchars($p['id']); ?></p>
<?php endforeach; ?>
<hr>

<h2>Один пост (со всеми данными, категория юзер)</h2>
<?php foreach ($post as $posts) : ?>
    <p>category: <?= htmlspecialchars($posts['category_name']); ?></p>
    <h3>title: <?= htmlspecialchars($posts['title']); ?></h3>
    <p>content: <?= htmlspecialchars($posts['content']); ?></p>
    <p>user: <?= htmlspecialchars($posts['user_name']); ?></p>
<?php endforeach; ?>
<hr>

<h2>Все категории</h2>
<?php foreach ($categories as $category) : ?>
    <p>category: <?= htmlspecialchars($category['name']); ?></p>
<?php endforeach; ?>
<hr>

<h2>Все посты одной категории</h2>
<?php foreach ($category_post as $post_category) : ?>
    <p>title: <?= htmlspecialchars($post_category['title']); ?></p>
    <p>content: <?= htmlspecialchars($post_category['content']); ?></p>
<?php endforeach; ?>
<hr>

</body>
</html>
