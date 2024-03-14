<?php

/*
Certainly! Selection Sort is another simple sorting algorithm that works by 
repeatedly finding the minimum element from the unsorted part of the array and putting it at the beginning. 
It maintains two subarrays: the sorted subarray and the unsorted subarray.

Here's how Selection Sort works:

Divide the array into two subarrays: sorted and unsorted.
Initially, the sorted subarray is empty, and the unsorted subarray is the entire input array.
Find the minimum element in the unsorted subarray.
Swap the minimum element with the first element of the unsorted subarray.
Expand the sorted subarray to include the newly sorted element.
Repeat steps 3-5 until the unsorted subarray becomes empty.
Now, let's implement Selection Sort in PHP:

64, 25, 12, 22, 11
1st iteration $i=0 where $j[1,5] minIndex:4 than array becomes : 11,25,12,22,64
2nd iteration $i=1 where $j[2,5] minIndex:2 than array becomes : 11,12,25,22,64
3rd iteration $i=2 where $j[3,5] minIndex:3 than array becomes : 11,12,22,25,64
4th iteration $i=3 where $j[4,5] minIndex:3 than array becomes : 11,12,22,25,64 
5th iteration $i=4 where $j[5,5] no inner loop iteration array already sorted.
*/

/**
 * Note: In selection sort, with every iteration, the algorithm finds the smallest element's index and 
 * moves it to the last index of the sorted portion.
 */

function selectionSort($arr) {
    $n = count($arr);
    // Traverse through all elements
    for ($i = 0; $i < $n - 1; $i++) {
        // Find the minimum element in the unsorted part of the array
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        echo "minIndex: ".$minIndex."\n";
        // Swap the found minimum element with the first element
        $temp = $arr[$minIndex];
        $arr[$minIndex] = $arr[$i];
        $arr[$i] = $temp;
    }
    return $arr;
}

// Example usage:
$array = [64, 25, 12, 22, 11];
echo "Original Array: \n";
echo implode(", ", $array) . "\n";

// Call the selectionSort function
$array = selectionSort($array);

echo "Sorted Array: \n";
echo implode(", ", $array) . "\n";

?>