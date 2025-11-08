<?php

function getPost(int $id): ?array
{
    return getPosts()[$id] ?? null;
}

function getCategories(): array
{
    return [
        1 => [
            'id' => 1,
            'name' => 'Политика',
            'slug' => 'politics'
        ],
        2 => [
            'id' => 2,
            'name' => 'Спорт',
            'slug' => 'sport'
        ]
    ];
}

function getPosts(): array
{
    return [
        1 => [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Пост 1',
            'text' => 'Текст поста о политике 1'
        ],
        2 => [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Пост 2',
            'text' => 'Текст поста о политике 2'
        ],
        3 => [
            'id' => 3,
            'category_id' => 2,
            'title' => 'Пост 3',
            'text' => 'Текст поста о спорте 3'
        ],
        4 => [
            'id' => 4,
            'category_id' => 2,
            'title' => 'Пост 4',
            'text' => 'Текст поста о спорте 4'
        ]
    ];

}

function getPostCategories($id): array
{
    $allPosts = getPosts();
    $filteredPosts = [];
    foreach ($allPosts as $post) {
        if ($post['category_id'] == $id) {
            $filteredPosts[] = $post;
        }
    }
    return $filteredPosts;
}

