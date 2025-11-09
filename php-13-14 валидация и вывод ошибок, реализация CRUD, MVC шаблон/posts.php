<?php

$posts = json_decode(file_get_contents('data/posts.json'), true);
$success = $_GET['success'] ?? null;

const STATUS = [
    'ERROR' => 0,
    'SUCCESS' => 1,
    'NOT_FOUND' => 2,
    'UPDATED' => 3
];

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'] ?? null;

    if ($id === null || !array_key_exists($id, $posts)) {
        header('Location: ?success=' . STATUS['NOT_FOUND']);
        die();
    }

    unset($posts[$id]);

    file_put_contents('data/posts.json', json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: ?success=' . STATUS['SUCCESS']);
    die();
}

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

<?php if ($success === (string)STATUS['NOT_FOUND']): ?>
    <p style="color:red">Ошибка удаления</p>
<?php endif; ?>

<?php if ($success === (string)STATUS['SUCCESS']): ?>
    <p style="color:green">Пост удален</p>
<?php endif; ?>

<h2>Посты</h2>
<a href="/create-post.php">Создать пост</a><br><br>
<?php foreach ($posts as $post): ?>
    <div>
        <a href="edit-post.php?action=edit&id=<?= htmlspecialchars($post['id']) ?>">[edit]</a>
        <a href="posts.php?action=delete&id=<?= htmlspecialchars($post['id']) ?>"
           onclick="return confirm('Вы уверены?')">[X]</a>
        <a href="post.php?id=<?= htmlspecialchars($post['id']) ?>">
            <b><?= htmlspecialchars($post['title']) ?></b>
        </a>
    </div>
<?php endforeach; ?>


</body>
</html>