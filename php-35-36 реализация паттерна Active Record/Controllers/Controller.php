<?php

namespace App\Controllers;

use App\Core\Render;

class Controller
{
    protected Render $render;


    public function __construct()
    {
        $this->render = new Render();
    }

    public function render(string $template, array $params = []): string
    {
        return $this->render->renderTemplate($template, $params);
    }

}