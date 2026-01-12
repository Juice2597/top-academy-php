<?php

namespace App\Controllers;

use App\Model\Post;

class PostController extends Controller
{
    public function actionIndex() {
        $posts = Post::getAll();
        echo $this->render('posts', ['posts' => $posts]);
    }

    public function actionShow() {
        $id = (int)$_GET['id'];
        $post = Post::getOne($id);
        echo $this->render('post', ['post' => $post]);
    }

}