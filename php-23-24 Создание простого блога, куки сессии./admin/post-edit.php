<?php
$posts = json_decode(file_get_contents('../data/posts.json'), true);
$post = [];
$id = (int)$_GET['id'];

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $id = (int)$_GET['id'];

    foreach ($posts as $p) {
        if ($p['id'] == $id) {
            $post = $p;
            break;
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'save') {
    $id = (int)$_POST['id'];
    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);

    if (empty($title) || empty($text)) {
        die('Заполните все поля');
    }

    $posts[$id] = [
        'id' => $id,
        'title' => $title,
        'text' => $text,
    ];

    file_put_contents('../data/posts.json', json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    header('Location: /../post.php?id=' . $id);
    die();
}
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
<form action="?action=save" method="post">
    Заголовок поста:<br>
    <input type="text" name="id" readonly hidden value="<?= $post['id'] ?? '' ?>">
    <input type="text" name="title" value="<?= $post['title'] ?? '' ?>"><br><br>
    Текст поста:<br>
    <textarea name="text" cols="30" rows="3"><?= $post['text'] ?? '' ?></textarea><br>
    <input type="submit" value="Изменить">
</form>
</body>
</html>
