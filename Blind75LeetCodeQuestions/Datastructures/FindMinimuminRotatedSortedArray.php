<?php

/*

Problem Statement
You have an array of length n, which was initially sorted in ascending order. 
This array was then rotated x times. It is given that 1 <= x <= n. For example, 
if you rotate [1, 2, 3, 4] array 3 times, resultant array is [2, 3, 4, 1].

Your task is to find the minimum element from this array. Note that the array contains unique elements.

You must write an algorithm that runs in O(log n) time.

Example 1:

Input: [8, 1, 3, 4, 5]
Expected Output: 1
Justification: The smallest number in the array is 1.

Example 2:

Input: [4, 5, 7, 8, 0, 2, 3]
Expected Output: 0
Justification: The smallest number in the array is 0.

Example 3:

Input: [7, 9, 12, 3, 4, 5]
Expected Output: 3
Justification: In this rotated array, the smallest number present is 3.

*/

function findMin($nums) {
    $left = 0;
    $right = count($nums) - 1;
    
    while ($left < $right) {
        $mid = (int)(($left + $right) / 2);
        
        // Check if the middle element is greater than the last element
        if ($nums[$mid] > $nums[$right]) {
            // Minimum element must be in the right half
            $left = $mid + 1;
        } else {
            // Minimum element must be in the left half or equal to the middle element
            $right = $mid;
        }
    }
    
    // $left or $right points to the minimum element
    return $nums[$left];
}

// Example usage:
$input1 = [8, 1, 3, 4, 5];
echo "Example 1: " . findMin($input1) . "\n";

$input2 = [4, 5, 7, 8, 0, 2, 3];
echo "Example 2: " . findMin($input2) . "\n";

$input3 = [7, 9, 12, 3, 4, 5];
echo "Example 3: " . findMin($input3) . "\n";



/*
If You want to find the Maximum 
*/
// function findMax($nums) {
//     $left = 0;
//     $right = count($nums) - 1;
    
//     while ($left < $right) {
//         $mid = (int)(($left + $right) / 2);
        
//         // Check if the middle element is greater than the first element
//         if ($nums[$mid] > $nums[0]) {
//             // Maximum element must be in the right half
//             $left = $mid + 1;
//         } else {
//             // Maximum element must be in the left half or equal to the middle element
//             $right = $mid;
//         }
//     }
    
//     // $left or $right points to the maximum element
//     return $nums[$left];
// }

// // Example usage:
// $input1 = [8, 1, 3, 4, 5];
// echo "Example 1: " . findMax($input1) . "\n";

// $input2 = [4, 5, 7, 8, 0, 2, 3];
// echo "Example 2: " . findMax($input2) . "\n";

// $input3 = [7, 9, 12, 3, 4, 5];
// echo "Example 3: " . findMax($input3) . "\n";

?>