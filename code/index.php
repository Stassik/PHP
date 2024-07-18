<?php
// Задание 1. 
// Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа, третий – операция. 
// Обязательно использовать оператор return.


function sum(float $arg1, float $arg2): float
{
    return $arg1 + $arg2;
}

function diff(float $arg1, float $arg2): float
{
    return $arg1 - $arg2;
}

function mult(float $arg1, float $arg2): float
{
    return $arg1 * $arg2;
}

function devide(float $arg1, float $arg2): float|string
{
    if ($arg2 == 0) {
        return "Ошибка деления на ноль";
    } else {
        return $arg1 / $arg2;
    }
}

var_dump(sum(1, 5));
var_dump(diff(2, 1));
var_dump(mult(2.2, 2));
var_dump(devide(2, 0));




// Задание 2. 
// Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
// В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) 
// и вернуть полученное значение (использовать switch).

function mathOperation(float $arg1, float $arg2, string $operation)
{
    switch ($operation) {
        case '+':
            return sum($arg1, $arg2);
            break;
        case '-':
            return diff($arg1, $arg2);
            break;
        case '*':
            return mult($arg1, $arg2);
            break;
        case '/':
            return devide($arg1, $arg2);
            break;
        default:
            return "Неизвестная операция";
    }
}

var_dump(mathOperation(3.5, 2, "/"));
var_dump(mathOperation(5, 1, "0"));

// Задание 3. 
// Объявить массив, в котором в качестве ключей будут использоваться названия областей, 
// а в качестве значений – массивы с названиями городов из соответствующей области.
// Вывести в цикле значения массива, чтобы результат был таким:
// Московская область: Москва, Зеленоград, Клин 
// Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт
// Рязанская область …
// (названия городов можно найти на maps.yandex.ru)

$regions = [
    "Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Касимов", "Михайлов", "Скопин"],
    "Самарская область" => ["Жигулёвск ", "Кинель", "Нефтегорск", "Самара", "Новокуйбышевс", "Тольятти"],
    "Севастополь" => ["Балаклава", "Инкерман", "Севастополь"],
];

var_dump(printArray($regions));

function printArray(array $array): string
{
    $str = "";
    foreach ($array as $key => $value) {
        $str = $str . $key . ": ";
        foreach ($value as $item) {
            if ($item === end($value)) {
                $str = $str . $item . "\n";
            } else {
                $str = $str . $item . ", ";
            }
        }
    }
    return $str;
}

// Задание 4. 
// Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания 
// (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). 
// Написать функцию транслитерации строк.

$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

var_dump(translate("Привет мир! Я - Иван Иванович", $alfabet));

function translate(string $str, array $alfabet): string
{
    $str = mb_strtolower($str);
    $result = "";
    for ($i = 0; $i < strlen($str); $i++) {
        $translateChar = mb_substr($str, $i, 1);
        foreach ($alfabet as $key => $value) {
            if (mb_substr($str, $i, 1) === $key) {
                $translateChar = $value;
            }
        }
        $result .= $translateChar;
    }
    return $result;
}

// Задание 5.*
// С помощью рекурсии организовать функцию возведения числа в степень. 
// Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow)
{
    if ($pow > 0) {
        return $val * power($val, $pow - 1);
    } else {
        return 1;
    }
}

echo power(2, 4);
