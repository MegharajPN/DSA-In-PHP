<?php

/*

Problem Statement
Given an array, find the length of the smallest subarray in it which when sorted will sort the whole array.

Example 1:

Input: [1, 2, 5, 3, 7, 10, 9, 12]
Output: 5
Explanation: We need to sort only the subarray [5, 3, 7, 10, 9] to make the whole array sorted

Example 2:

Input: [1, 3, 2, 0, -1, 7, 10]
Output: 5
Explanation: We need to sort only the subarray [1, 3, 2, 0, -1] to make the whole array sorted
Example 3:

Input: [1, 2, 3]
Output: 0
Explanation: The array is already sorted
Example 4:

Input: [3, 2, 1]
Output: 3
Explanation: The whole array needs to be sorted.

*/

function findUnsortedSubarray($nums) {
    $n = count($nums);
    if ($n <= 1) return 0;

    $start = 0;
    $end = $n - 1;

    // Find the start of the unsorted subarray
    while ($start < $n - 1 && $nums[$start] <= $nums[$start + 1]) {
        $start++;
    }

    // If the array is already sorted, return 0
    if ($start == $n - 1) return 0;

    // Find the end of the unsorted subarray
    while ($end > 0 && $nums[$end] >= $nums[$end - 1]) {
        $end--;
    }

    // Find the minimum and maximum values in the unsorted subarray
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    for ($i = $start; $i <= $end; $i++) {
        $min = min($min, $nums[$i]);
        $max = max($max, $nums[$i]);
    }

    // Extend the unsorted subarray if there are elements greater than the minimum value
    while ($start > 0 && $nums[$start - 1] > $min) {
        $start--;
    }

    // Extend the unsorted subarray if there are elements smaller than the maximum value
    while ($end < $n - 1 && $nums[$end + 1] < $max) {
        $end++;
    }

    return $end - $start + 1;
}

// Example usage:
$input1 = [1, 2, 5, 3, 7, 10, 9, 12];
echo "Input: " . json_encode($input1) . "\n";
echo "Expected Output: 5\n";
echo "Actual Output: " . findUnsortedSubarray($input1) . "\n\n";

$input2 = [1, 3, 2, 0, -1, 7, 10];
echo "Input: " . json_encode($input2) . "\n";
echo "Expected Output: 5\n";
echo "Actual Output: " . findUnsortedSubarray($input2) . "\n\n";

$input3 = [1, 2, 3];
echo "Input: " . json_encode($input3) . "\n";
echo "Expected Output: 0\n";
echo "Actual Output: " . findUnsortedSubarray($input3) . "\n\n";

$input4 = [3, 2, 1];
echo "Input: " . json_encode($input4) . "\n";
echo "Expected Output: 3\n";
echo "Actual Output: " . findUnsortedSubarray($input4) . "\n";


?>