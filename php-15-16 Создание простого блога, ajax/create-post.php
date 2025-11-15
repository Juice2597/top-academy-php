<?php

$categories = json_decode(file_get_contents('data/categories.json'), true);


//CREATE
if (!empty($_POST)) {
    $posts = json_decode(file_get_contents('data/posts.json'), true);
    //добавляете пост в файл

    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $category_id = (int)$_POST['category_id'];

    $errors = [];

    //Валидация
    if (empty($title)) {
        $errors['title'] = 'Заполните поле title';
    }
    if (empty($text)) {
        $errors['text'] = 'Заполните поле text';
    }

    if (empty($errors)) {
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
        header('Location: post.php?id=' . $lastKey . '&success=[1,2]');
        die();

    }

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
<a href="/categories.php">Categories</a><br>


<h2>Создать пост</h2>
<form action="" method="post">
    Заголовок поста:<br>
    <input type="text" name="title" value="<?= $_POST['title'] ?? '' ?>">
    <?php if (!empty($errors['title'])):?>
        <p style="color:red"><?=$errors['title']?></p>
    <?php endif;?>

    <br>
    Категория:<br>
    <select name="category_id">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"
                <?= ($_POST['category_id'] ?? '') == $category['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($category['name']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>
    Текст поста:<br>
    <textarea name="text" cols="30" rows="3"><?= $_POST['text'] ?? '' ?></textarea>
    <?php if (!empty($errors['text'])):?>
        <p style="color:red"><?=$errors['text']?></p>
    <?php endif;?>
    <br>
    <input type="submit" value="Добавить">
</form>
</body>
</html>