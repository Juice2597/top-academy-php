<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        //Извлечь из модели посты
        $posts = DB::table('posts')->get();

        return view('posts', ['posts' => $posts]);
    }

    public function show(int $id)
    {
        $post = DB::table('posts')->find($id);

        return view('post', ['post' => $post]);
    }
}
