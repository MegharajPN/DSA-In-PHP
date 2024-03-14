<?php

/*


Problem Statement
Given a string s, return the maximum number of unique substrings that the given string can be split into.

You can split string s into any list of non-empty substrings, where the concatenation of the substrings forms the original string. 
However, you must split the substrings such that all of them are unique.

A substring is a contiguous sequence of characters within a string.

Example 1:

Input: s = "aab"  
Output: 2  
Explanation: Two possible ways to split the given string into maximum unique substrings are: ['a', 'ab'] & ['aa', 'b'], 
both have 2 substrings; hence the maximum number of unique substrings in which the given string can be split is 2.

Example 2:

Input: s = "abcabc"  
Output: 4  
Explanation: Four possible ways to split into maximum unique substrings are: ['a', 'b', 'c', 'abc'] & ['a', 'b', 'cab', 'c'] & 
['a', 'bca', 'b', 'c'] & ['abc', 'a', 'b', 'c'], all have 4 substrings.


*/


class Solution {
    function maxUniqueSplit($s) {
        return $this->splitAndCount($s, 0, []);
    }

    function splitAndCount($s, $start, $set) {
        // base case, if we have reached the end of the input string, return the size of the set
        if ($start === strlen($s))
            return count($set);

        $count = 0;
        // loop through all substrings starting from the current start position
        for ($i = $start + 1; $i <= strlen($s); $i++) {
            $substring = substr($s, $start, $i - $start);
            // if the substring is not in the set, add it and recursively call the function with the new start position
            if (!in_array($substring, $set)) {
                $set[] = $substring;
                $count = max($count, $this->splitAndCount($s, $i, $set));
                array_pop($set); // remove the substring from the set and backtrack
            }
        }
        return $count; // return the maximum count of unique substrings found
    }
}

$sol = new Solution();

// Test Case 1
$input1 = "abcabc";
$output1 = $sol->maxUniqueSplit($input1);
echo "maxUniqueSplit(" . $input1 . ") = " . $output1 . "\n"; //Expected: 4

// Test Case 2
$input2 = "aab";
$output2 = $sol->maxUniqueSplit($input2);
echo "maxUniqueSplit(" . $input2 . ") = " . $output2 . "\n"; //Expected: 2




?>