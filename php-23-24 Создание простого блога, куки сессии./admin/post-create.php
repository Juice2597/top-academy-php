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

//обработчик формы
if (isset($_GET['action']) && $_GET['action'] == 'create') {
    //валидация
    $title = htmlspecialchars($_POST['title'] ?? '');
    $text = htmlspecialchars($_POST['text'] ?? '');

    if (empty($title) || empty($text)) {
        $error = 'Заполните все поля';

    } else {
        //добавление новых данных
        $posts = json_decode(file_get_contents(dirname(__DIR__) . '/data/posts.json'), true);

        $posts[] = [
            'title' => $title,
            'text' => $text,
        ];
        //добавляем сгенерированный id в массив
        $lastKey = array_key_last($posts);
        $posts[$lastKey]['id'] = $lastKey;

        file_put_contents(dirname(__DIR__) . '/data/posts.json', json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $_SESSION['success'] = 'Пост успешно добавлен';
        header('Location: /post.php?id=' . $lastKey);
        exit();
    }


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

<?php include __DIR__ . "/../alerts.php" ?>

<h1>Создать пост</h1>
<form action="/admin/post-create.php?action=create" method="post">

    Заголовок поста:<br>
    <input type="text" name="title" value="<?=htmlspecialchars($_POST['title'] ?? '')?>"><br><br>

    Текст поста:<br>
    <textarea name="text" cols="30" rows="3"><?=htmlspecialchars($_POST['text'] ?? '')?></textarea><br>

    <input type="submit" value="Добавить">
</form>
</body>
</html>
