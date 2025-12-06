<?php

$posts = json_decode(file_get_contents(__DIR__ . '/data/posts.json'), true);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Посты</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include __DIR__ . "/menu.php" ?>

<h1>Посты</h1>
<?php foreach ($posts as $post): ?>
    <div>
        <h2>
            <a href="/post.php?id=<?= htmlspecialchars($post['id']) ?>">
                <?= htmlspecialchars($post['title']) ?>
            </a>
        </h2>
    </div>
<?php endforeach; ?>
</body>
</html>
