<?php


// Quick Sort is a highly efficient sorting algorithm that divides the array into smaller subarrays based on a chosen pivot element. 
// It then recursively sorts the subarrays. Quick Sort follows the divide-and-conquer strategy to sort elements.

// Here's how Quick Sort works:
// Choose a Pivot: Select a pivot element from the array. The pivot can be chosen in various ways, such as the first element, last element, or a random element.
// Partitioning: Rearrange the elements in the array such that all elements less than the pivot are placed before it, and all elements greater than the pivot are placed after it. After partitioning, the pivot element is in its final sorted position.
// Recursively Sort Subarrays: Recursively apply the Quick Sort algorithm to the subarrays formed by partitioning the original array. One subarray contains elements less than the pivot, and the other contains elements greater than the pivot.
// Combine Subarrays: The subarrays are sorted recursively. Once all subarrays are sorted, the entire array becomes sorted.

// Now, let's implement Quick Sort in PHP:

function quickSort($arr) {

    // Base case: If the array has fewer than 2 elements, it's already sorted
    if (count($arr) <= 1) {
            return $arr;
    }
    
    $pivot = $arr[0]; // Choose the first element as the pivot
    $left = $right = [];

    // Partition the array into elements less than the pivot and elements greater than the pivot
    for ($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] < $pivot) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }
      
    // Recursively apply quickSort to the left and right subarrays
    $left = quickSort($left);
    $right = quickSort($right);

    // Concatenate the sorted left subarray, pivot, and sorted right subarray
    return array_merge($left, [$pivot], $right);
}

// Example usage:
$array = [10, 7, 8, 9, 1, 5];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the quickSort function
$array = quickSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";

?>