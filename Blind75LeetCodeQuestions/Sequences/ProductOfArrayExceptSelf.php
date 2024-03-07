<?php

/*

Given an array of integers, return a new array where each element at index i of the new array is the product 
of all the numbers in the original array except the one at i. You must solve this problem without using division.

Example Generation

Input: [2, 3, 4, 5]
Expected Output: [60, 40, 30, 24]
Justification: For the first element: 3*4*5 = 60, for the second element: 2*4*5 = 40, 
for the third element: 2*3*5 = 30, and for the fourth element: 2*3*4 = 24.

Input: [1, 1, 1, 1]
Expected Output: [1, 1, 1, 1]
Justification: Every element is 1, so the product of all other numbers for each index is also 1.

Input: [10, 20, 30, 40]
Expected Output: [24000, 12000, 8000, 6000]
Justification: For the first element: 20*30*40 = 24000, for the second element: 10*30*40 = 12000, 
for the third element: 10*20*40 = 8000, and for the fourth element: 10*20*30 = 6000.

*/

function ProductOfArrayExceptSelf($arr)
{
    $power_arr = [];

    for ($i = 0; $i < count($arr); $i++) {
        if($i == count($arr)-1){
            $j = 0;
        }else{
            $j = $i + 1;
        }
        $mul = 1;
        while (($j != $i)  && ($j < count($arr))) {
            $mul = $arr[$j] * $mul;
            $j = $j + 1;
            if ($j > count($arr) - 1) {
                $j = 0;
            }
            if ($j == $i) {
                array_push($power_arr,$mul);
                break;
            }
        }
    }

    return $power_arr;
}

$value = ProductOfArrayExceptSelf([2, 3, 4, 5]);
echo "Total array is : " . implode(",", $value) . "\n";

$value1 = ProductOfArrayExceptSelf([1, 1, 1, 1]);
echo "Total array is : " . implode(",", $value1) . "\n";

$value2 = ProductOfArrayExceptSelf([10, 20, 30, 40]);
echo "Total array is : " . implode(",", $value2) . "\n";