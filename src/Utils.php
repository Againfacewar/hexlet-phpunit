<?php

namespace Hexlet\Phpunit\Utils;
function reverseString($string)
{
    return implode(array_reverse(str_split($string)));
}
function set(&$coll, array $path, $value)
{
    $length = count($path);
    $lastIndex = $length - 1;
    $index = 0;
    $nested = &$coll;

    while ($index < $length) {
        $key = $path[$index];
        $newValue = $value;
        if ($index !== $lastIndex) {
            $objValue = $nested[$key] ?? null;
            $newValue = is_array($objValue) ? $objValue : [];
        }
        $nested[$key] = $newValue;
        $nested = &$nested[$key];
        $index += 1;
    }
    return $coll;
}

$coll = [
    'a' => [
        'b' => [
            'c' => 3
        ]
    ]
];

set($coll, ['a', 'b', 'c'], 4);
print_r($coll);
//set($coll, ['x', 'y', 'z'], null);
print_r("\n");
//var_dump($coll);