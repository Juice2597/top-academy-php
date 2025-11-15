<?php
//READ
const STATUSES = [
    'ok' => 'Пост успешно создан',
    'info' => 'Поздравляю',
];

$posts = json_decode(file_get_contents('data/posts.json'), true);
$id = (int)$_GET['id'];
$post = $posts[$id] ?? null;

$success = STATUSES[($_GET['success'] ?? null)] ?? null;

if(isset($_GET['ajax']) && $_GET['action'] === 'like') {
    $posts[$id]['likes'] += 1;
    file_put_contents('data/posts.json', json_encode($posts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo json_encode(['success' => true]);
    exit;
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

<?php if (!empty($success)): ?>
    <p style="color:green"><?= $success ?></p>
<?php endif; ?>



<?php if (!is_null($post)): ?>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <div>
        <b><?= htmlspecialchars($post['text']) ?></b>
    </div>
    <div>
        <p id="likesCount">Лайков <?= htmlspecialchars($post['likes']) ?></p> <button class="like" data-id="<?= htmlspecialchars($post['id']) ?>">❤️ Лайк</button>
    </div>
<?php else: ?>
    Нет поста
<?php endif; ?>
<script>
    const like = document.querySelector(".like")
    like.addEventListener('click', async () => {
        const id = like.getAttribute('data-id');
        const response = await fetch('post.php?action=like&ajax&id=' + id);
        const answer = await response.json();
        if (answer.success) {
            const likesElement = document.getElementById("likesCount");
            const currentLikes = parseInt(likesElement.textContent.match(/\d+/)[0]);
            likesElement.textContent = `Лайков ${currentLikes + 1}`;
        } else {
            console.log('error like')
        }
    })
</script>
</body>
</html>