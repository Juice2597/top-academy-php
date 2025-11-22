<?php
include 'functions/auth.php';

$categories = json_decode(file_get_contents('data/categories.json'), true);
$posts = json_decode(file_get_contents('data/posts.json'), true);
$success = $_GET['success'] ?? null;
$post = [];

if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    //показать форму и вывести на ней данные поста для правки
    $id = (int)$_GET['id'];
    $post = $posts[$id] ?? null;
}

if (isset($_GET['action']) && $_GET['action'] === 'save') {

    //принять новые исправленные данные поста и сохранить его
    $id = htmlspecialchars($_POST['id']);
    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $category_id = (int)$_POST['category_id'];


    //Валидация
    if (empty($title) || empty($text) || empty($category_id)) {
        header('Location: ?action=edit&id=' . $id . '&success=0');
        die();
    }

    $posts[$id] = [
        'id' => $id,
        'category_id' => $category_id,
        'title' => $title,
        'text' => $text,
    ];

    file_put_contents('data/posts.json', json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    //редирект методом GET
    header('Location: post.php?id=' . $id . '&success=3');
    die();
}

if (empty($post)) {
    header('Location: posts.php');
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
<?php include 'parts/menu.php' ?>

<?php if ($success === "0"): ?>
    <p style="color:red">Заполните все поля!</p>
<?php endif; ?>

<h2>Создать пост</h2>
<form action="?action=save" method="post">
    Заголовок поста:<br>
    <input type="text" name="id" readonly hidden value="<?= $post['id'] ?? '' ?>">
    <input type="text" name="title" value="<?= $post['title'] ?? '' ?>"><br><br>
    Категория:<br>
    <select name="category_id">
        <?php foreach ($categories as $category): ?>

            <option <?php if ($category['id'] == $post['category_id']): ?> selected <?php endif; ?>
                    value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>
    Текст поста:<br>
    <textarea name="text" cols="30" rows="3"><?= $post['text'] ?? '' ?></textarea><br>
    <input type="submit" value="Изменить">
</form>
</body>
</html>