<?php
function splitArray5_13_5(array $array): array {
    $part1Size = 5;
    $part2Size = 13;
    $part3Size = 5;

    $part1 = array_slice($array, 0, $part1Size);
    $part2 = array_slice($array, $part1Size, $part2Size);
    $part3 = array_slice($array, $part1Size + $part2Size, $part3Size);

    return [$part1, $part2, $part3];
}
