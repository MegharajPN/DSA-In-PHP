<?php

/*

Problem Statement
Given an array of numbers which is sorted in ascending order and also rotated by some arbitrary number, 
find if a given ‘key’ is present in it.

Write a function to return the index of the ‘key’ in the rotated array. If the ‘key’ is not present, return -1. 
You can assume that the given array does not have any duplicates.

Example 1:
[1,3,8,10,15]
After 2 Rotation 
Input: [10, 15, 1, 3, 8], key = 15
Output: 1
Explanation: '15' is present in the array at index '1'.

Example 2:
[-1,2,4,5,7,9,10]
After 5 Rotation
Input: [4, 5, 7, 9, 10, -1, 2], key = 10
Output: 4
Explanation: '10' is present in the array at index '4'.
 
*/



function SearchinRotatedSortedArray($array,$rotation,$numfind){

    $array_after_rotation = $array;

    $n = count($array);
    $rotation = $rotation % $n; // Handle cases where rotation is greater than the length of the array
    
    // Rotate the array to the right k times
    for ($i = 0; $i < $rotation; $i++) {
        $last = array_pop($array_after_rotation);
        array_unshift($array_after_rotation, $last);
    }


    $index = array_search($numfind,$array_after_rotation,true);

    return $index;
}


$value = SearchinRotatedSortedArray([1,3,8,10,15],2,15);
echo "Value is ".$value."\n";


$value1 = SearchinRotatedSortedArray([-1,2,4,5,7,9,10],5,10);
echo "Value-1 is ".$value1."\n";

?>