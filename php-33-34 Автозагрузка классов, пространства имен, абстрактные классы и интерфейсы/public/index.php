<?php
use App\Core\Db;
use App\Model\{Category, Comment, Post, User};

include '../vendor/autoload.php';

//include '../model/Post.php';
//spl_autoload_register('loader');
/*function loader($class_name)
{

    $class_name = str_replace(['App\\', '\\'], [__DIR__ . '/../', '/'], $class_name) . '.php';

    if (file_exists($class_name)) {
        require_once $class_name;
    } else {
        die("Class $class_name not found");
    }

}*/

$db = new Db();

$comment = new Comment($db, 0, "new comment", 1);
print_r($comment);

//insert
$post = new Post($db);
$post->getOne(1) . PHP_EOL;
$post->getAll() . PHP_EOL;

$user = new User($db);
$user->getOne(2) . PHP_EOL;
$user->getAll() . PHP_EOL;

$category = new Category($db);
$category->getOne(1) . PHP_EOL;
$category->getAll() . PHP_EOL;




exit();


//CRUD Active Record
$posts = Post::getAll();

$post = Post::getOne(4);
$post->title = 'Новый';
$post->save();
$post->delete(); //$post->id

$post = new Post("тест");
$post->save();
