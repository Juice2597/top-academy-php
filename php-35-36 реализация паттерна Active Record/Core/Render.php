<?php

namespace App\Core;

class Render
{
    //$params = ['post' => 'текст поста']
    //$template = 'post'
    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);
        //$post = 'текст поста';
        include '../views/' . $template . '.php';

        return ob_get_clean();


    }

}