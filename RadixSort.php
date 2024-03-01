<?php

// Radix Sort is a non-comparative sorting algorithm that sorts numbers by processing individual digits.
// It sorts numbers digit by digit, starting from the least significant digit (rightmost digit) to the most 
// significant digit (leftmost digit). Radix Sort can be applied to numbers represented in any positional numeral system, 
// but it's commonly used with base-10 (decimal) numbers.

// Here's how Radix Sort works:

// Initialize Buckets: Create 10 buckets (0 to 9) to hold numbers based on the current digit being processed.

// Iterate through Digits: Iterate through each digit position (from the least significant digit to the most significant digit) of the numbers.

// Bucket Distribution: Place each number into one of the buckets based on the value of the current digit being processed.

// Collecting Buckets: After distributing all numbers into buckets for the current digit position, collect the numbers back from the buckets in the order they appear (from bucket 0 to bucket 9).

// Repeat: Repeat steps 2 to 4 for each digit position, moving from the least significant digit to the most significant digit.

// Final Sorted Array: After processing all digits, the array will be sorted.

function radixSort($arr) {
    $max = max($arr);
    $exp = 1;
    
    while ($max / $exp > 0) {
        $count = array_fill(0, 10, 0); // Initialize count array for digits 0 to 9
        $output = array_fill(0, count($arr), 0); // Initialize output array
        
        // Count the occurrences of each digit at the current position
        foreach ($arr as $num) {
            $count[($num / $exp) % 10]++;
        }
        
        // Modify count array to store cumulative counts
        for ($i = 1; $i < 10; $i++) {
            $count[$i] += $count[$i - 1];
        }
        
        // Build the output array by placing elements into buckets
        for ($i = count($arr) - 1; $i >= 0; $i--) {
            $index = ($arr[$i] / $exp) % 10;
            $output[$count[$index] - 1] = $arr[$i];
            $count[$index]--;
        }
        
        // Copy the output array back to the original array
        for ($i = 0; $i < count($arr); $i++) {
            $arr[$i] = $output[$i];
        }
        
        // Move to the next significant digit
        $exp *= 10;
    }
    
    return $arr;
}

// Example usage:
$array = [170, 45, 75, 90, 802, 24, 2, 66];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the radixSort function
$array = radixSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";

?>