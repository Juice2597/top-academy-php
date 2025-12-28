<?php

$db = new PDO('sqlite:db.sqlite');

$posts = $db->query("SELECT * FROM posts")->fetchAll();

$categories = $db->query("SELECT * FROM categories")->fetchAll();

$post = [];

//CREATE
if (isset($_GET['action']) && $_GET['action'] == 'create') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $category_id = (int)$_POST['category_id'];
    $user_id = $_POST['user_id'];

    $errors = [];

    // Валидация
    if (empty($title)|| empty($content) ||$category_id < 1) {
        $errors[] = 'Все поля обязательны';
    }


    if (empty($errors)) {
        $create = $db->prepare("INSERT INTO posts (title, content, category_id, user_id) 
    VALUES (:title, :content, :category_id, :user_id)");
        $create->execute(['title' => $title, 'content' => $content, 'category_id' => $category_id, 'user_id' => $user_id]);
        $lastkey = $db->lastInsertId();
        header('Location: index.php?id=' . $lastkey);
        die();
    }
}

//EDIT

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'] ?? null;
    $update = $db->prepare("SELECT * FROM posts WHERE id = :id");
    $update->execute(['id' => $id]);
    $post = $update->fetch();
}

//SAVE

if (isset($_GET['action']) && $_GET['action'] == 'save') {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = (int)$_POST['category_id'];
    $update = $db->prepare("UPDATE posts SET title = :title, content = :content, category_id = :category_id WHERE id = :id");
    $update->execute([
        ':title' => $title,
        ':content' => $content,
        ':category_id' => $category_id,
        ':id' => $id
    ]);

    header('Location: index.php');
    die();

}

//DELETE

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $posts = $db->prepare("DELETE FROM posts WHERE id = :id");
    $posts->execute(['id' => $id]);
    header("Location: index.php");
    die();
}

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
<h2>Создать пост</h2>
<form action="/?action=create" method="post">
    <input type="text" name="user_id" value="1" hidden="hidden">
    <input type="text" name="title" placeholder="title"/>
    <select name="category_id" id="category_id">
        <option value="1">Спорт</option>
        <option value="2">Новости</option>
    </select>
    <input type="text" name="content" placeholder="content"/>
    <button>Создать</button>
</form>


<section>
    <h2>Список постов</h2>
    <?php foreach ($posts as $post) : ?>
        <div>
            <button onclick="window.edit_<?= $post['id'] ?>.showModal()">
                Редактировать
            </button>
            <dialog id="edit_<?= $post['id'] ?>">
                <form action="?action=save&id=<?= $post['id'] ?>" method="post">
                    <input type="text" name="user_id" value="1" hidden="hidden">
                    <input type="text" name="title" placeholder="title"
                           value="<?= htmlspecialchars($post['title']) ?>"/>
                    <input type="text" name="content" placeholder="content"
                           value="<?= htmlspecialchars($post['content']) ?>"/>
                    <select name="category_id" id="category_id">
                        <option value="1">Спорт</option>
                        <option value="2">Новости</option>
                    </select>
                    <button>Обновить</button>
                </form>
            </dialog>
            <span><?= htmlspecialchars($post['title']) ?></span>
            <a href="index.php?action=delete&id=<?= htmlspecialchars($post['id']) ?>">
                Удалить пост
            </a>
        </div>
    <?php endforeach; ?>
    <h2>Посты</h2>
    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php foreach ($posts as $post) : ?>
        <div id="<?= htmlspecialchars($post['id']) ?>">
            <h2>name: <?= htmlspecialchars($post['title']) ?></h2>
            <p>content: <?= htmlspecialchars($post['content']) ?></p>
        </div>
    <?php endforeach; ?>
</section>
</body>
</html>
