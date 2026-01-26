<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Извлечь из модели посты
        $posts = Post::query()->orderByDesc('id')->paginate(10);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
           'title' => ['required', 'string', 'max:255', 'min:3'],
           'category_id' => ['required', 'integer', 'exists:categories,id'],
           'content' => ['required', 'string', 'min:3'],
       ],
           [
               'title.required' => 'Заголовок обязателен для заполнения',
               'title.string' => 'Заголовок должен быть строкой',
               'title.max' => 'Заголовок не должен превышать 255 символов',
               'title.min' => 'Заголовок должен содержать минимум 3 символа',
               'category_id.required' => 'Выберите категорию',
               'category_id.integer' => 'Категория должна быть числом',
               'category_id.exists' => 'Выбранная категория не существует',
               'content.required' => 'Содержание поста обязательно',
               'content.string' => 'Содержание должно быть текстом',
               'content.min' => 'Содержание должно содержать минимум 10 символов',
           ]
       );

       try {
           Post::create($validated);

           return redirect()->route('admin.posts.index')
               ->with('success', 'Пост успешно создан!');

       } catch (\Exception $e) {
           return redirect()->back()
               ->with('error', 'Произошла ошибка при создании поста: ' . $e->getMessage())
               ->withInput();
       }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255', 'min:3'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'content' => ['required', 'string', 'min:3'],
        ], [
            'title.required' => 'Заголовок обязателен для заполнения',
            'title.string' => 'Заголовок должен быть строкой',
            'title.max' => 'Заголовок не должен превышать 255 символов',
            'title.min' => 'Заголовок должен содержать минимум 3 символа',
            'category_id.required' => 'Выберите категорию',
            'category_id.integer' => 'Категория должна быть числом',
            'category_id.exists' => 'Выбранная категория не существует',
            'content.required' => 'Содержание поста обязательно',
            'content.string' => 'Содержание должно быть текстом',
            'content.min' => 'Содержание должно содержать минимум 10 символов',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $post->update($validator->validated());


            // Редирект с сообщением об успехе
            return redirect()->route('admin.posts.index')
                ->with('success', 'Пост успешно обновлен!');

        } catch (\Exception $e) {
            // Обработка ошибок базы данных
            return redirect()->back()
                ->with('error', 'Произошла ошибка при обновлении поста: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {

            // Удаляем пост
            $postTitle = $post->title;
            $post->delete();

            return redirect()->route('admin.posts.index')
                ->with('success', "Пост \"{$postTitle}\" успешно удален!");

        } catch (\Exception $e) {
            return redirect()->route('admin.posts.index')
                ->with('error', 'Ошибка при удалении поста: ' . $e->getMessage());
        }
    }
}
