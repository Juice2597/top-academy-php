<?php

use App\Model\{Category, Post, User};

include '../vendor/autoload.php';

$controllerName = $_GET['page'] ?? 'home'; // localhost/
$action = $_GET['action'] ?? 'index';

$controllerClass = 'App\\Controllers\\' . ucfirst($controllerName) . 'Controller';
$actionName = 'action' . ucfirst($action);

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        Die("Нет такого Action");
    }

} else {
    die("Нет такого контроллера");
}







exit();

$post = Post::getOne(1);

$post = Post::getLimit(10, 20); //LIMIT 10, 20

$posts = Post::getAll();
$user = User::getOne(1);
$category = Category::getOne(1);
print_r($category);

//crud


//insert


$post = $post->getOne(1) . PHP_EOL; //Active Record
$posts = $post->getAll() . PHP_EOL;

$user = new User($db);
$user = $user->getOne(2) . PHP_EOL;
$user->getAll() . PHP_EOL;


exit();

//$post = DB::table('posts')->find(4); //Query builder
//CRUD Active Record
$posts = Post::getAll();

$post = Post::getOne(4);
$user = $post->user();

$user->name = 'admin';
$user->save();


$post->title = 'Новый';
$post->save();
$post->delete(); //$post->id

$post = new Post("тест");
$post->save();
