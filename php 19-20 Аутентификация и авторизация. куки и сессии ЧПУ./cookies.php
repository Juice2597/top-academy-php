<?php
include 'functions/auth.php';

if (isset($_COOKIE['counter'])) {
    $counter = $_COOKIE['counter'] + 1;
} else {
    $counter = 0;
}

setcookie('counter', $counter, time() + 36000, '/');



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php include 'parts/menu.php' ?><br>
 Число посещений страницы <?=$counter?>.
</body>
</html>

