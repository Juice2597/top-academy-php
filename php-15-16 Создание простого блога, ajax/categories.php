<?php
$categories = json_decode(file_get_contents('data/categories.json'), true);

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
<a href="/">Калькулятор</a>
<a href="/posts.php">Посты</a><br>
<a href="/categories.php">Categories</a><br>

<a href="create-category.php">Создать категорию</a>
<?php foreach ($categories as $category): ?>
    <div class="category-item">
        <span><?= $category['name'] ?></span>
        <a href="edit-category.php?id=<?= htmlspecialchars($category['id']) ?>"> Редактировать</a>
        <a href="delete-category.php?id=<?= htmlspecialchars($category['id']) ?>"
           onclick="return confirm('Удалить категорию?')">Удалить</a>
    </div>
<?php endforeach; ?>
<script>
    const
</script>
</body>
</html>
