<?php

namespace App\Interfaces;

interface IModel
{
    public function getAll();
    public function getOne($id);

}