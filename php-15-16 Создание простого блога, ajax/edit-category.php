<?php
$categories = json_decode(file_get_contents('data/categories.json'), true);
$categoryId = $_GET['id'];
$category = $categories[$categoryId];
if(isset($categories[$categoryId]) && $_POST) {
    $categories[$categoryId]['name'] = $_POST['name'];
    $categories[$categoryId]['slug'] = $_POST['slug'];
    file_put_contents('data/categories.json', json_encode($categories, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('location: categories.php');
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
<form method="post">
    <input type="text" name="name" value="<?= htmlspecialchars($category['name']) ?>" required>
    <input type="text" name="slug" value="<?= htmlspecialchars($category['slug']) ?>" required>
    <button>Обновить категорию</button>
</form>
</body>
</html>
