<?php
include 'functions/auth.php';

$color = $_COOKIE['color'] ?? 'white';

if (isset($_POST['color'])) {
    $color = $_POST['color'];
    setcookie('color', $color, time() + 36000, "/");
    header('location: color.php');
    die();
}
?>
<style>
    body {
        background: <?=$color?>;
    }
</style>
<?php include 'parts/menu.php' ?><br>
<form method="post">
    <button name="color" value="green">Green</button>
    <button name="color" value="blue">Blue</button>
    <button name="color" value="blueviolet">Blueviolet</button>
</form>
