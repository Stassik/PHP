<?php
// Задание 1
// Даны два упорядоченных массива, например,
// [1, 4, 6, 6, 8]
// [2, 5, 7, 9]
// Нужно написать логику, которая сольёт массивы в один упорядоченный по
// возрастанию значений
// [1, 2, 4, 5, 6, 6, 7, 8, 9]

$array1 = [1, 4, 6, 6, 8];
$array2 = [2, 5, 7, 9];
$result = [];

$count1 = 0;
$count2 = 0;

while ($count1 < count($array1) && $count2 < count($array2)) {
    if ($array1[$count1] < $array2[$count2]) {
        $result[] =  $array1[$count1];
        $count1++;
    } else {
        $result[] =  $array2[$count2];
        $count2++;
    }
}

if ($count1 < count($array1)) {
    for (; $count1 < count($array1); $count1++) {
        $result[] = $array1[$count1];
    }
}

if ($count2 < count($array2)) {
    for (; $count2 < count($array2); $count2++) {
        $result[] = $array2[$count2];
    }
}

echo "<pre>";



// Задание 3

$str = "(()())(())";


echo checkString($str) ? "Все ОК" : "Ошибка";


function checkString(string $str): bool
{
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] === "(") {
            $count++;
        } else if ($str[$i] === ")") {
            $count--;
        }

        if ($count < 0) {
            return false;
        }
    }
    return $count === 0;
}
