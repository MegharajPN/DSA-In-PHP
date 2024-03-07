<?php

/*

Problem Statement
Given an integer array nums, return true if any value appears at least twice in the array, and return false if every element is distinct.

Example 1:

Input: nums= [1, 2, 3, 4]
Output: false  
Explanation: There are no duplicates in the given array.
Example 2:

Input: nums= [1, 2, 3, 1]
Output: true  
Explanation: '1' is repeating.

*/

function checkDupicates($arr)
{
    $duplicate_arrays = [];

    for ($i = 0; $i < count($arr); $i++) {
        if ($i != (count($arr) - 1)) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$i] == $arr[$j]) {
                    if (!in_array($j, $duplicate_arrays)) {
                        array_push($duplicate_arrays, $arr[$i]);
                    }
                }
            }
        }
    }

    return $duplicate_arrays;
}


$value = checkDupicates([1, 2, 3, 4]);
echo count($value) ? "Duplicate Number is : " . implode(",",$value) . "\n"  : "No Duplicate Number is there in ". implode(",",[1, 2, 3, 4]). "\n" ;

$value1 = checkDupicates([1, 2, 3, 1, 2]);
echo count($value1) ? "Duplicate Number is : " . implode(",",$value1) . "\n" : "No Duplicate Number is there in ". implode(",",[1, 2, 3, 1, 2]). "\n" ;

