<?php
//READ
$posts = json_decode(file_get_contents('data/posts.json'), true);
$id = (int)$_GET['id'];
$post = $posts[$id] ?? null;
$success = $_GET['success'] ?? null;

const STATUS = [
    'ERROR' => 0,
    'SUCCESS' => 1,
    'NOT_FOUND' => 2,
    'UPDATED' => 3
];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="/">Калькулятор</a>
<a href="/posts.php">Посты</a><br>

<?php if ($success === (string)STATUS['SUCCESS']): ?>
    <p style="color:green">Пост создан</p>
<?php endif; ?>

<?php if ($success === (string)STATUS['UPDATED']): ?>
    <p style="color:green">Пост изменен</p>
<?php endif; ?>

<?php if (!is_null($post)): ?>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <div>
        <b><?= htmlspecialchars($post['text']) ?></b>
    </div>
<?php else: ?>
    Нет поста
<?php endif; ?>
</body>
</html>