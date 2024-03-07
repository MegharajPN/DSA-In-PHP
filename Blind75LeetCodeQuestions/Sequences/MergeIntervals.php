<?php

/*


Given a list of intervals, merge all the overlapping intervals to produce a list that has only mutually exclusive intervals.

Example 1:

Intervals: [[1,4], [2,5], [7,9]]
Output: [[1,5], [7,9]]
Explanation: Since the first two intervals [1,4] and [2,5] overlap, we merged them into one [1,5].

Example 2:

Intervals: [[6,7], [2,4], [5,9]]
Output: [[2,4], [5,9]]
Explanation: Since the intervals [6,7] and [5,9] overlap, we merged them into one [5,9].

Example 3:

Intervals: [[1,4], [2,6], [3,5]]
Output: [[1,6]]
Explanation: Since all the given intervals overlap, we merged them into one

*/

function mergeIntervals($intervals) {
    if (empty($intervals)) {
        return [];
    }

    // Sort the intervals based on the start time
    usort($intervals, function($a, $b) {
        return $a[0] - $b[0];
    });

    $merged = [$intervals[0]];

    for ($i = 1; $i < count($intervals); $i++) {
        $lastMerged = &$merged[count($merged) - 1];
        $current = $intervals[$i];

        // If the current interval overlaps with the last merged interval, merge them
        if ($current[0] <= $lastMerged[1]) {
            $lastMerged[1] = max($lastMerged[1], $current[1]);
        } else {
            // If not overlapping, add the current interval to the merged list
            $merged[] = $current;
        }
    }

    return $merged;
}

$value = mergeIntervals([[1, 4], [2, 5], [7, 9]]);

foreach ($value as $key => $data) {
    echo "Merge Intervals are : " . implode(",", $data) . "\n";
}

echo "\n";

$value1 = mergeIntervals([[6,7], [2,4], [5,9]]);

foreach ($value1 as $key1 => $data1) {
    echo "Merge Intervals_1 are : " . implode(",", $data1) . "\n";
}

echo "\n";

$value2 = mergeIntervals([[1,4], [2,6], [3,5]]);

foreach ($value2 as $key2 => $data2) {
    echo "Merge Intervals_2 are : " . implode(",", $data2) . "\n";
}
