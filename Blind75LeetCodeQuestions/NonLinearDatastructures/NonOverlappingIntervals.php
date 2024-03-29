<?php

/*

Problem Statement
Given a list of non-overlapping intervals sorted by their start time, insert a given interval at the correct position and 
merge all necessary intervals to produce a list that has only mutually exclusive intervals.

Example 1:

Input: Intervals=[[1,3], [5,7], [8,12]], New Interval=[4,6]
Output: [[1,3], [4,7], [8,12]]
Explanation: After insertion, since [4,6] overlaps with [5,7], we merged them into one [4,7].

Example 2:

Input: Intervals=[[1,3], [5,7], [8,12]], New Interval=[4,10]
Output: [[1,3], [4,12]]
Explanation: After insertion, since [4,10] overlaps with [5,7] & [8,12], we merged them into [4,12].

Example 3:

Input: Intervals=[[2,3],[5,7]], New Interval=[1,4]
Output: [[1,4], [5,7]]
Explanation: After insertion, since [1,4] overlaps with [2,3], we merged them into one [1,4].

*/


function insertInterval($intervals, $newInterval) {
    $result = [];
    $i = 0;
    $n = count($intervals);
    
    // Add all intervals that end before the new interval starts
    while ($i < $n && $intervals[$i][1] < $newInterval[0]) {
        $result[] = $intervals[$i];
        $i++;
    }
    
    // Merge intervals that overlap with the new interval
    while ($i < $n && $intervals[$i][0] <= $newInterval[1]) {
        $newInterval[0] = min($newInterval[0], $intervals[$i][0]);
        $newInterval[1] = max($newInterval[1], $intervals[$i][1]);
        $i++;
    }
    
    $result[] = $newInterval;
    
    // Add remaining intervals
    while ($i < $n) {
        $result[] = $intervals[$i];
        $i++;
    }
    
    return $result;
}

// Example usage:
$intervals1 = [[1,3], [5,7], [8,12]];
$newInterval1 = [4,6];
print_r(insertInterval($intervals1, $newInterval1)); // Output: [[1,3], [4,7], [8,12]]

$intervals2 = [[1,3], [5,7], [8,12]];
$newInterval2 = [4,10];
print_r(insertInterval($intervals2, $newInterval2)); // Output: [[1,3], [4,12]]

$intervals3 = [[2,3],[5,7]];
$newInterval3 = [1,4];
print_r(insertInterval($intervals3, $newInterval3)); // Output: [[1,4], [5,7]]



?>