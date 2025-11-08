<?php
function decrement()
{
    $a = $_POST['a'] ?? 0;
    $b = $_POST['b'] ?? 0;
    $result = $a - $b;

    return [
        'currentPage' => 'decrement',
        'operation' => '-',
        'a' => $a,
        'b' => $b,
        'result' => $result
    ];
}