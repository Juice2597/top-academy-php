<?php
session_start();
$users = json_decode(file_get_contents(__DIR__ . '/../data/users.json'), true);

$isAdmin = false;
$isLoggedIn = false;

if (isset($_SESSION['isAdmin'])) {
    $isAdmin = $_SESSION['isAdmin'];
}

if (isset($_SESSION['isLoggedIn'])) {
    $isLoggedIn = $_SESSION['isLoggedIn'];
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['login'] === $login && password_verify($password, $user['password'])) {
            switch ($user['role']) {
                case 'admin':
                    $isAdmin = true;
                    $_SESSION['isAdmin'] = true;
                    break;
                case 'user':
                    $isLoggedIn = true;
                    $_SESSION['isLoggedIn'] = true;
                    break;
                default:
                    $isLoggedIn = true;
                    echo('no role');
                    break;
            }
        }

    }
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    header('Location: /');
    die();

}
