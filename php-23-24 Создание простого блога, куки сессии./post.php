<?php
session_start();
$error = null;
$success = null;

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}


//Действия контроллера
$posts = json_decode(file_get_contents(__DIR__ . '/data/posts.json'), true);
$id = $_GET['id'] ?? null;
$post = $posts[$id] ?? null;



//шаблон
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пост</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include __DIR__ . "/menu.php" ?>

<?php include __DIR__ . "/alerts.php" ?>

<?php if ($post !== null): ?>
    <h1><?= $post['title'] ?></h1>
    <p><?= $post['text'] ?></p>
<?php else: ?>
    Нет такого поста
<?php endif; ?>
</body>
</html>
