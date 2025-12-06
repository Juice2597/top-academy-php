<?php

$posts = json_decode(file_get_contents(dirname(__DIR__) . '/data/posts.json'), true);
$id = $_GET['id'] ?? null;

include __DIR__ . "/post-delete.php"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Посты</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<?php include __DIR__ . "/menu.php" ?>

<h1>Посты</h1>
<a href="/admin/post-create.php">Создать пост</a>
<?php foreach ($posts as $post): ?>
    <div>
        <a href="../post.php?id=<?= htmlspecialchars($post['id']) ?>"><?= htmlspecialchars($post['title']) ?></a>
        <a href="posts.php?action=delete&id=<?= htmlspecialchars($post['id']) ?>"
           onclick="return confirm('Вы уверены, что хотите удалить пост ?')">[X]</a>
        <a href="post-edit.php?action=edit&id=<?= htmlspecialchars($post['id']) ?>">Редактировать</a>
    </div>
<?php endforeach; ?>
</body>
</html>
