<?php

/*

Problem Statement
Given a string, determine the number of palindromic substrings present in it.

A palindromic substring is a sequence of characters that reads the same forwards and backward. 
The substring can be of any length, including 1.

Example
Input: "racecar"
Expected Output: 10
Justification: The palindromic substrings are "r", "a", "c", "e", "c", "a", "r", "cec", "aceca", "racecar".

Input: "noon"
Expected Output 6
Justification: The palindromic substrings are "n", "o", "o", "n", "oo", "noon".

Input: "apple"
Expected Output: 6
Justification: The palindromic substrings are "a", "p", "p", "l", "e", "pp".

*/

function countPalindromicSubstrings($s) {
    $n = strlen($s);
    $count = 0;

    // Initialize a 2D array to track palindromic substrings
    $dp = array_fill(0, $n, array_fill(0, $n, false));

    // Single characters are palindromic
    for ($i = 0; $i < $n; $i++) {
        $dp[$i][$i] = true;
        $count++;
    }

    // Check for palindromic substrings of length 2
    for ($i = 0; $i < $n - 1; $i++) {
        if ($s[$i] == $s[$i + 1]) {
            $dp[$i][$i + 1] = true;
            $count++;
        }
    }

    // Check for palindromic substrings of length greater than 2
    for ($len = 3; $len <= $n; $len++) {
        for ($i = 0; $i <= $n - $len; $i++) {
            $j = $i + $len - 1;
            if ($s[$i] == $s[$j] && $dp[$i + 1][$j - 1]) {
                $dp[$i][$j] = true;
                $count++;
            }
        }
    }

    return $count;
}

// Example usage:
$input1 = "racecar";
echo "Input: \"$input1\"\n";
echo "Expected Output: 10\n";
echo "Actual Output: " . countPalindromicSubstrings($input1) . "\n";

$input2 = "noon";
echo "\nInput: \"$input2\"\n";
echo "Expected Output: 6\n";
echo "Actual Output: " . countPalindromicSubstrings($input2) . "\n";

$input3 = "apple";
echo "\nInput: \"$input3\"\n";
echo "Expected Output: 6\n";
echo "Actual Output: " . countPalindromicSubstrings($input3) . "\n";



?>