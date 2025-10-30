<?php

/**
 * Разработайте функцию aggregationData() с объявленными типами аргументов и возвращаемого значения,
 * принимающую в качестве аргумента массив целых чисел.
 * $mas = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
 * Результатом работы функции должен быть массив, содержащий три элемента:
 * max — наибольшее число, min — наименьшее число, avg — среднее арифметическое всех чисел массива.
 * не использовать цикл!
 */

$array = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
$res = [];
function aggregationData(array $array): array
{
    $maxValue = max($array);
    $minValue = min($array);
    $avgValue = array_sum($array) / count($array);
    $res = [
        'max' => $maxValue,
        'min' => $minValue,
        'avg' => $avgValue
    ];
    return $res;
}

print_r(aggregationData($array));