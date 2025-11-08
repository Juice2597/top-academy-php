<?php
function multiply()
{
    $a = $_POST['a'] ?? 0;
    $b = $_POST['b'] ?? 0;
    $result = $a * $b;

    return [
        'currentPage' => 'multiply',
        'operation' => '*',
        'a' => $a,
        'b' => $b,
        'result' => $result
    ];
}

