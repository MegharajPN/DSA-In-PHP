<?php

/*

Given an array of unsorted numbers, find all unique triplets in it that add up to zero.

Example 1:

Input: [-3, 0, 1, 2, -1, 1, -2]
Output: [[-3, 1, 2], [-2, 0, 2], [-2, 1, 1], [-1, 0, 1]]
Explanation: There are four unique triplets whose sum is equal to zero. smallest sum.'
Example 2:

Input: [-5, 2, -1, -2, 3]
Output: [[-5, 2, 3], [-2, -1, 3]]
Explanation: There are two unique triplets whose sum is equal to zero.

*/

function Sum3($input)
{
    $triplets = [];

    for ($i = 0; $i < count($input); $i++) {
        $j = ($i == count($input) - 1) ? 0 : $i + 1;
        for ($j = $j; $j < count($input) - 1; $j++) {
            $k = ($j == count($input) - 1) ? 0 : $j + 1;
            $sum = $input[$i] + $input[$j] + $input[$k];
            if ($sum == 0) {
                $triplets[] = [$input[$i] , $input[$j] , $input[$k]];
            }
        }
    }

    $triplets = array_map("unserialize", array_unique(array_map("serialize", $triplets)));

    return $triplets;
}

$value = Sum3([-3, 0, 1, 2, -1, 1, -2]);
foreach ($value as $key => $data) {
    echo "Tuplets-1 are : " . implode(",", $data) . "\n";
}

echo "\n";

$value1 = Sum3([-5, 2, -1, -2, 3]);
foreach ($value1 as $key1 => $data1) {
    echo "Tuplets-2 are : " . implode(",", $data1) . "\n";
}
