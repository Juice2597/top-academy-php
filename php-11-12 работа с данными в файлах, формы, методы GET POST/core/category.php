<?php
function getPostCategories($category): array
{
    $allPosts = json_decode(file_get_contents(__DIR__ . "/../db.json"), true) ?? [];
    $filteredCategory = [];
    foreach ($allPosts as $post) {
        if ( $post['category'] == $category) {
            $filteredCategory[] = $post;
        }
    }
    return $filteredCategory;
}