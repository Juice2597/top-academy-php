<?php
function increment()
{
    $a = $_POST['a'] ?? 0;
    $b = $_POST['b'] ?? 0;
    $result = $a + $b;

    return [
        'currentPage' => 'increment',
        'operation' => '+',
        'a' => $a,
        'b' => $b,
        'result' => $result
    ];
}

