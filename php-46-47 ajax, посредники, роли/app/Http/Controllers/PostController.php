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
      //  $posts = DB::table('posts')->get();
        $posts = Post::query()->paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        //$post = DB::table('posts')->find($id);
        //$post = Post::find($id);

        return view('posts.show', ['post' => $post]);
    }
}
