<?php

// Merge Sort is a divide-and-conquer sorting algorithm that divides the input array into two halves, 
// sorts each half recursively, and then merges the sorted halves to produce a single sorted array. 
// It's known for its stability and efficient performance.

// Here's how Merge Sort works:

// Divide: Divide the unsorted array into two halves recursively until each subarray contains only one element. This is the base case of the recursion.

// Conquer: Merge the subarrays back together in a sorted order. This involves comparing the elements of the two subarrays and placing them in the correct order into a temporary array.

// Combine: Continue merging and combining the subarrays until the entire array is sorted.

function mergeSort($arr) {
    $length = count($arr);
    
    // Base case: If the array has fewer than 2 elements, it's already sorted
    if ($length <= 1) {
        return $arr;
    }
    
    // Split the array into two halves
    $mid = (int) ($length / 2);
    $left = array_slice($arr, 0, $mid);
    $right = array_slice($arr, $mid);
    
    
    echo "Left Array: \n";
    echo implode(", ", $left) . "\n";
    echo "Right Array: \n";
    echo implode(", ", $right) . "\n";
    
    // Recursively sort the two halves
    $left = mergeSort($left);
    $right = mergeSort($right);

    
    // Merge the sorted halves
    return merge($left, $right);
}

function merge($left, $right) {
    echo "Left and Right Array: \n";
    echo implode(", ", $left) . "\n";
    echo implode(", ", $right) . "\n";
    $result = [];
    $leftIndex = $rightIndex = 0;

    // Compare elements from the left and right arrays and merge them into the result array
    while ($leftIndex < count($left) && $rightIndex < count($right)) {
        if ($left[$leftIndex] < $right[$rightIndex]) {
            $result[] = $left[$leftIndex];
            $leftIndex++;
        } else {
            $result[] = $right[$rightIndex];
            $rightIndex++;
        }
    }

    // Append any remaining elements from the left and right arrays
    while ($leftIndex < count($left)) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }
    while ($rightIndex < count($right)) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }

    return $result;
}

// Example usage:
$array = [12, 11, 13, 5, 6, 7];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the mergeSort function
$array = mergeSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";



?>