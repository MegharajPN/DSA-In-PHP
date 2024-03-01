<?php 


// Counting Sort is an integer sorting algorithm that works by counting the number of occurrences of each unique element
// in the input array. It then uses this count information to place each element into its correct sorted position.

// Here's how Counting Sort works:

// Counting Frequencies: Count the frequency of each distinct element in the input array and store this 
// information in a separate count array.

// Prefix Sum: Modify the count array to store the cumulative sum of frequencies. 
// This step helps determine the correct position of each element in the sorted array.

// Build the Sorted Array: Traverse the input array from right to left. For each element, 
// look up its count in the modified count array to determine its position in the sorted array. 
// Decrement the count for that element in the count array to handle duplicate elements.

function countingSort($arr) {
    // Find the maximum element in the array
    $max = max($arr);
    
    // Initialize the count array with zeros
    $count = array_fill(0, $max + 1, 0);
    
    // Count the frequency of each element in the input array
    foreach ($arr as $element) {
        $count[$element]++;
    }

    // Modify the count array to store cumulative frequencies
    for ($i = 1; $i <= $max; $i++) {
        $count[$i] += $count[$i - 1];
    }

    // Build the sorted array
    $sorted = array_fill(0, count($arr), 0);

    for ($i = count($arr) - 1; $i >= 0; $i--) {
        $element = $arr[$i];
        $sorted[$count[$element] - 1] = $element;
        $count[$element]--;
    }

    return $sorted;
}

// Example usage:
$array = [4, 2, 2, 8, 3, 3, 1];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the countingSort function
$array = countingSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";

?>