<?php

/*

Problem Statement
Given an integer array, find the contiguous subarray (at least one number in it) that has the maximum product. 
Return this maximum product.

Examples
Input: [2,3,-2,4]
Expected Output: 6

Justification: The subarray [2,3] has the maximum product of 6.
Input: [-2,0,-1]
Expected Output: 0

Justification: The subarray [0] has the maximum product of 0.
Input: [-2,3,2,-4]
Expected Output: 48

Justification: The subarray [-2,3,2,-4] has the maximum product of 48


*/


function maxProductSubarray($nums) {
    $max_product = $nums[0];
    $min_product = $nums[0];
    $result = $nums[0];
    
    for ($i = 1; $i < count($nums); $i++) {
        $temp_max = max($nums[$i], $max_product * $nums[$i], $min_product * $nums[$i]);
        $min_product = min($nums[$i], $max_product * $nums[$i], $min_product * $nums[$i]);
        
        $max_product = $temp_max;
        
        $result = max($result, $max_product);
    }
    
    return $result;
}

// Example usage:
$input1 = [2,3,-2,4];
$input2 = [-2,0,-1];
$input3 = [-2,3,2,-4];

echo maxProductSubarray($input1); // Output: 6
echo "\n";
echo maxProductSubarray($input2); // Output: 0
echo "\n";
echo maxProductSubarray($input3); // Output: 48




?>