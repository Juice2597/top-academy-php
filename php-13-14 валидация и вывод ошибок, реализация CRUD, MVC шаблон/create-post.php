<?php

$categories = json_decode(file_get_contents('data/categories.json'), true);
$success = $_GET['success'] ?? null;
$error_display = $_GET['error'] ?? 'Заполните все поля!';

const STATUS = [
    'ERROR' => 0,
    'SUCCESS' => 1,
    'NOT_FOUND' => 2,
    'UPDATED' => 3
];

//CREATE
if (!empty($_POST)) {
    $posts = json_decode(file_get_contents('data/posts.json'), true);
    //добавляете пост в файл

    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $category_id = (int)$_POST['category_id'];

    $errors = [];

    //Валидация
//    if (empty($title) || empty($text) || empty($category_id)) {
//        header('Location: ?success=0');
//        die();
//    }

    $error_type = '';
    switch (true) {
        case empty($title) && empty($text) && empty($category_id):
            $error_type = 'заполните все поля';
            break;
        case empty($title):
            $error_type = 'заполните заголовок поста';
            break;
        case empty($text):
            $error_type = 'заполните текст поста';
            break;
        case empty($category_id):
            $error_type = 'выберите категорию';
            break;
        default:
            $error_type = 'valid';
            break;

    }

    if ($error_type !== 'valid') {
        header('Location: ?success=' . STATUS['ERROR'] . '&error=' . urlencode($error_type));
        die();
    }

    //создаем новый пост в массиве, id генерится автоматом
    $posts[] = [
        'category_id' => $category_id,
        'title' => $title,
        'text' => $text,

    ];

    //добавляем сгенерированный id в массив
    $lastKey = array_key_last($posts);
    $posts[$lastKey]['id'] = $lastKey;

    //сделать красиво, чтобы id шел первым
    $posts[$lastKey] = array_merge(['id' => $lastKey], $posts[$lastKey]);

    file_put_contents('data/posts.json', json_encode($posts, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    //редирект методом GET
    header('Location: post.php?id=' . $lastKey . '&success=' . STATUS['SUCCESS']);
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
<?php if ($success === (string)STATUS['ERROR']): ?>
    <p style="color:red">Ошибка: <?= $error_display; ?></p>
<?php endif; ?>

<h2>Создать пост</h2>
<form action="" method="post">
    Заголовок поста:<br>
    <input type="text" name="title"><br><br>
    Категория:<br>
    <select name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select><br><br>
    Текст поста:<br>
    <textarea name="text" cols="30" rows="3"></textarea><br>
    <input type="submit" value="Добавить">
</form>
</body>
</html>