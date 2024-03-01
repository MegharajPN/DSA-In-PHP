<?php

// Insertion Sort is another simple sorting algorithm that builds the final sorted array one item at a time.
//  It iterates over each element in the array, removing it from the unsorted portion and inserting it into its correct position 
// within the sorted portion.

// Here's how Insertion Sort works:

// Start with the second element (index 1) and consider it as the key.
// Compare the key with the elements before it in the sorted subarray.
// Move the elements greater than the key to one position ahead of their current position in the sorted subarray.
// Insert the key into its correct position in the sorted subarray.
// Repeat steps 2-4 until all elements in the array are in their correct positions.
// Now, let's implement Insertion Sort in PHP:

// [12, 11, 13, 5, 6]

// 1st iteration:
// $i = 1, $key = 11.
// Compare 11 with the element before it (12).
// Since 12 > 11, swap 12 with 11.
// Array after swap: 11, 12, 13, 5, 6.

// 2nd iteration
// $i = 2, $key = 13.
// Compare 13 with the element before it (12).
// Since 12 < 13, no swap.
// Array remains: 11, 12, 13, 5, 6.

// 3rd iteration:
// $i = 3, $key = 5.
// Compare 5 with the elements before it (13, 12, 11).
// Since 13 > 5, swap 13 with 5. Array becomes 11, 12, 5, 13, 6.
// Compare 5 with the element before it (12).
// Since 12 > 5, swap 12 with 5. Array becomes 11, 5, 12, 13, 6.
// Compare 5 with the element before it (11).
// Since 11 > 5, swap 11 with 5. Array becomes 5, 11, 12, 13, 6.

// 4th iteration:
// $i = 4, $key = 6.
// Compare 6 with the elements before it (13, 12, 11, 5).
// Since 13 > 6, swap 13 with 6. Array becomes 5, 11, 12, 6, 13.
// Compare 6 with the element before it (12).
// Since 12 > 6, swap 12 with 6. Array becomes 5, 11, 6, 12, 13.
// Final iteration:

// No swaps are needed as the array is already sorted. 

function insertionSort($arr) {
    $n = count($arr);
    for ($i = 1; $i < $n; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        // Move elements of arr[0..$i-1], that are greater than key,
        // to one position ahead of their current position
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j = $j - 1;
            echo "j-index : ".implode(", ",$arr)."\n";
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

// Example usage:
$array = [12, 11, 13, 5, 6];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the insertionSort function
$array = insertionSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";

?>