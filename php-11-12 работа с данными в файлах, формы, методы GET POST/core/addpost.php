<?php
function addPost()
{
    $posts = json_decode(file_get_contents(__DIR__ . "/../db.json"), true) ?? [];

    if (!empty($_POST)) {
        $name = $_POST["name"];
        $title = $_POST["title"];
        $category = $_POST["category"];
        $id = count($posts) + 1;
        $newPost = [
            'name' => $name,
            'title' => $title,
            'category' => $category,
            'id' => $id
        ];
        $posts[] = $newPost;
        file_put_contents(__DIR__ . "/../db.json", json_encode($posts, JSON_PRETTY_PRINT));
        header("Location: /?page=post-created&id=" . $id);
        die();
    }

    return $posts;
}