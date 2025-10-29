<?php
/**
 * Используя switch по заданному $n, выведите числа от $n до 15 включительно
 * например 10 11 12 13 14 15 при $n=10
 * *как вариант используйте цикл
 */
$n = 10;
switch ($n) {
    case 10:
        echo '10 ';
    case 11:
        echo '11 ';
    case 12:
        echo '12 ';
    case 13:
        echo '13 ';
    case 14:
        echo '14 ';
    case 15:
        echo '15 ';
        break;
    default:
        echo 'Число должно быть от 10 до 15';
}

for ($i = $n; $i <= 15; $i++) {
    echo $i . ' ';
}

while ($n <= 15) {

    echo $n . ' ';
    $n++;
}
