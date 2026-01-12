1. Сделать моделям конструктор, чтобы можно было так:
$post = new Post('title', 'content')

2. Сделайте страницу со списком категорий

3*. На странице ?page=post&action=show&id=23 такого поста не существует, обработайте эту ошибку (лучше в шаблоне)

4*. В class Model добавьте public function getLimit()
$post = Post::getLimit(10, 20); //LIMIT 10, 20
