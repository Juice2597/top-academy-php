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
<a href="/">Главная</a>
<a href="/?page=category">Список категорий</a>
<a href="/?page=post">Посты</a><br>
<?php foreach ($categories as $category): ?>
    <div>
        <a href="/?page=categories&action=show&id=<?= htmlspecialchars($category['id']) ?>">
            <?= htmlspecialchars($category['name']) ?>
        </a>
    </div>
<?php endforeach; ?>
</body>
</html>