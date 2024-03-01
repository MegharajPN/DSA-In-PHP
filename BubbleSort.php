<?php

// Bubble Sort is a simple sorting algorithm that repeatedly steps through the list, compares adjacent elements, and 
// swaps them if they are in the wrong order. The pass through the list is repeated until the list is sorted.

// Here's how Bubble Sort works:

// Start from the beginning of the array.
// Compare the first two elements.
// If the first element is greater than the second element, swap them.
// Move to the next pair of elements, repeat steps 2 and 3 until the end of the array.
// Repeat steps 1-4 until no more swaps are needed, indicating that the array is sorted.
// Now, let's implement Bubble Sort in PHP:

/**
 * Note: In bubble sort, with every iteration, the smallest element moves towards the left side, resulting in ascending order.
 */

function bubbleSort($arr)
{
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $swapped = false;
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Swap
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
                $swapped = true;
            }
        }
        // If no two elements were swapped in the inner loop, the array is already sorted.
        if (!$swapped) {
            break;
        }
    }
    return $arr;
}

// Example usage:
$array = [64, 34, 25, 12, 22, 11, 90];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the bubbleSort function
$array = bubbleSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";
