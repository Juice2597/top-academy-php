<?php $color = $_COOKIE['color'] ?? 'white'; ?>

<?php if ($isAdmin): ?>
    <a href="/admin/posts.php">Админка</a>
    Добро пожаловать Админ. <a href="?action=logout">Выйти.</a><br>
<?php elseif ($isLoggedIn): ?>
    Добро пожаловать  <a href="?action=logout">Выйти.</a><br>
<?php else: ?>
    <form action="?action=login" method="post">
        <input type="text" placeholder="admin || user" name="login">
        <input type="password" placeholder="1234" name="password">
        save? <input name="save" type="checkbox">
        <input type="submit" value="Вход">
    </form>
<?php endif; ?>
<style>
    body {
        background: <?=$color ?>;
    }
</style>

<a href="/">Калькулятор</a>
<a href="/cookies.php">cookies</a>
<a href="/sessions.php">sessions</a>
<a href="/color.php">color</a>
<a href="/posts.php">Посты</a><br>