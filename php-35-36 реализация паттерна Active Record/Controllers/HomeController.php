<?php

namespace App\Controllers;

class HomeController extends Controller
{
    function actionIndex() {

        echo $this->render('index');

    }


}