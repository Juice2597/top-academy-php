<?php

/**
 * Используя mt_rand, сгенерируйте массив размером 100 элементов так,
 * чтобы все элементы были в диапазоне от 1 до 200 УНИКАЛЬНЫЕ
 * Используйте цикл.
 * Используйте только функции работы с массивами
 */

$array = [];
for ($i = 0; $i < 100;) {
    $res = mt_rand(1, 200);

    if (!in_array($res, $array)) {
        array_push($array, $res);
        $i++;
    }
}
print_r($array);

/**
 * 2 Вариант
 */

while (count($array) < 100) {
    $res = mt_rand(1, 200);
    if (!in_array($res, $array)) {
        array_push($array, $res);
    }
}

print_r($array);