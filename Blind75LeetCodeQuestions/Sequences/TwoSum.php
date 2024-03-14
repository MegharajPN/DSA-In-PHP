<?php

/*


Problem Statement
You are given an array of integers nums and an integer target. Your task is to find two distinct indices i and j such that the sum of nums[i] and nums[j] is equal to the target. You can assume that each input will have exactly one solution, and you may not use the same element twice.

Examples
Example 1:

Input: [3, 2, 4], 6
Expected Output: [1, 2]
Justification: nums[1] + nums[2] gives 2 + 4 which equals 6.
Example 2:

Input: [-1, -2, -3, -4, -5], -8
Expected Output: [2, 4]
Justification: nums[2] + nums[4] yields -3 + (-5) which equals -8.
Example 3:

Input: [10, 15, 20, 25, 30], 45
Expected Output: [1, 3]
Justification: nums[1] + nums[3] gives 15 + 30 which equals 45.

*/

function sumTwo($arr, $sum)
{
    $index_arrays = [];

    for ($i = 0; $i < count($arr); $i++) {

        if ($i != (count($arr) - 1)) {
            for ($j = $i + 1; $j < count($arr); $j++) {

                if (($arr[$i] + $arr[$j]) == $sum) {
                    $index_arrays = [$i, $j];
                    return $index_arrays;

                    break;
                }
            }
        } else {
            return $index_arrays;
            break;
        }
    }
}

$value = sumTwo([3, 2, 4], 6);
$value1 = sumTwo([-1, -2, -3, -4, -5], -8);
$value2 = sumTwo([10, 15, 20, 25, 30], 45);

echo "Sum of Two : " . implode(", ", $value) . "\n";
echo "Sum of Two : " . implode(", ", $value1) . "\n";
echo "Sum of Two : " . implode(", ", $value2) . "\n";

?>