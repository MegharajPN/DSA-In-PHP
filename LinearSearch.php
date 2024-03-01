<?php

// Linear Search is a simple searching algorithm that sequentially searches for a target value within an array. 
// It compares each element of the array with the target value until a match is found or the end of the array is reached.

// Here's how Linear Search works:

// Start from the beginning of the array: Begin searching from the first element of the array.

// Compare each element: Compare the target value with each element of the array sequentially.

// Match found: If a match is found, return the index of the element containing the target value.

// End of array: If the end of the array is reached without finding a match, return a special value (e.g., -1) to indicate that the target value is not present in the array.

// Now, let's implement Linear Search in PHP:


function linearSearch($arr, $target) {
    $n = count($arr);
    // Iterate through the array
    for ($i = 0; $i < $n; $i++) {
        // Check if the current element is equal to the target value
        if ($arr[$i] === $target) {
            // If a match is found, return the index of the element
            return $i;
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

// Call the linearSearch function
$result = linearSearch($array, $target);

if ($result !== -1) {
    echo "Target found at index: $result\n";
} else {
    echo "Target not found in the array\n";
}


?>