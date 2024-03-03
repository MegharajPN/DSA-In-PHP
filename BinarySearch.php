<?php



// Binary Search is an efficient searching algorithm used to find the position of a target value within a sorted array.
//  It works by repeatedly dividing the search interval in half until the target value is found or the interval becomes empty.

// Here's how Binary Search works:

// Initialize: Start with the entire sorted array.

// Midpoint Calculation: Calculate the midpoint of the array.

// Comparison: Compare the target value with the value at the midpoint.

// Update Search Interval: If the target value is equal to the value at the midpoint, the search is successful, and the position of the target is returned. If the target value is less than the value at the midpoint, search the left half of the array. If the target value is greater than the value at the midpoint, search the right half of the array.

// Repeat: Repeat steps 2-4 until the target value is found or the search interval becomes empty.

// Now, let's implement Binary Search in PHP:


function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;

    // Continue searching while the left index is less than or equal to the right index
    while ($left <= $right) {
        // Calculate the midpoint
        $mid = (int) (($left + $right) / 2);

        // Check if the target value is equal to the value at the midpoint
        if ($arr[$mid] === $target) {
            // If a match is found, return the index of the midpoint
            return $mid;
        }

        // If the target value is less than the value at the midpoint, search the left half
        if ($target < $arr[$mid]) {
            $right = $mid - 1;
        } 
        // If the target value is greater than the value at the midpoint, search the right half
        else {
            $left = $mid + 1;
        }
    }

    // If the target value is not found, return -1
    return -1;
}

// Example usage:
$array = [10, 20, 30, 40, 50];
$target = 30;

echo "Original Array: \n";
echo implode(", ", $array) . "\n";
echo "Target Value: $target\n";

// Call the binarySearch function
$result = binarySearch($array, $target);

if ($result !== -1) {
    echo "Target found at index: $result\n";
} else {
    echo "Target not found in the array\n";
}


?>