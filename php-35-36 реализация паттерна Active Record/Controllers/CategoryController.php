<?php

namespace App\Controllers;

use App\Model\Category;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $categories = Category::getAll();
        echo $this->render('categories', ['categories' => $categories]);
    }
}