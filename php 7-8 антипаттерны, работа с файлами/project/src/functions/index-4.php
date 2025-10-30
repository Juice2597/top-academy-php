<?php

/**
 * Дан массив $array = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2]; сделайте алгоритм и найдите сумму между
 * минимальным и максимальными значениями. Не используя готовые функции. Используя цикл.
 * Используйте один цикл, в один проход.
 * @param array $array исходный массив
 * $valueMax Максимальное значение в массиве
 * $valueMin Минимальное значение в массиве
 */

$array = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$valueMax = PHP_INT_MIN;
$valueMin = PHP_INT_MAX;

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] > $valueMax) {
        $valueMax = $array[$i];
    }
    if ($valueMin > $array[$i]) {
        $valueMin = $array[$i];
    }
}

echo $valueMax + $valueMin;