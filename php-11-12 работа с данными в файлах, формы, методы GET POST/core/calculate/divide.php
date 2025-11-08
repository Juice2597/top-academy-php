<?php
function divide()
{
    $a = $_POST['a'] ?? 0;
    $b = $_POST['b'] ?? 0;
    $result = '';
    if ($b != 0) {
        $result = $a / $b;
    }

    return [
        'currentPage' => 'divide',
        'operation' => '/',
        'a' => $a,
        'b' => $b,
        'result' => $result
    ];
}

