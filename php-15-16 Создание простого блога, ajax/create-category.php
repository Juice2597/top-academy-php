<?php

if ($_POST) {
    $categories = json_decode(file_get_contents('data/categories.json'), true);
    $newId = max(array_keys($categories)) + 1;
    $categories[$newId] = [
        'id' => $newId,
        'name' => $_POST['name'],
        'slug' => $_POST['slug']
    ];
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
    <input type="text" name="name" placeholder="название категории" required>
    <input type="text" name="slug" placeholder="slug" required>
    <button>Создать</button>
</form>
</body>
</html>
