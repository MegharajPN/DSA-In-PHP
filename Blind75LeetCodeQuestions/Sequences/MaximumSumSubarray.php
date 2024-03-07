<?php

/*

Given an array of positive numbers and a positive number 'k,' find the maximum sum of any contiguous subarray of size 'k'.

Example 1:

Input: [2, 1, 5, 1, 3, 2], k=3 
Output: 9
Explanation: Subarray with maximum sum is [5, 1, 3].
Example 2:

Input: [2, 3, 4, 1, 5], k=2 
Output: 7
Explanation: Subarray with maximum sum is [3, 4].

*/

function maxSubarraySum($arr, $k) {
    $maxSum = 0;
    $currentSum = 0;
    $windowStart = 0;

    for ($windowEnd = 0; $windowEnd < count($arr); $windowEnd++) {
        $currentSum += $arr[$windowEnd];

        if ($windowEnd >= $k - 1) {
            $maxSum = max($maxSum, $currentSum);
            $currentSum -= $arr[$windowStart];
            $windowStart++;
        }
    }

    return $maxSum;
}

$value = maxSubarraySum([2, 1, 5, 1, 3, 2], 3);
echo "value : ".$value."\n";

$value1 = maxSubarraySum([2, 3, 4, 1, 5], 2);
echo "value : ".$value1."\n";
