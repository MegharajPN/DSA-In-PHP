<?php

/*

Problem Statement
Given a string with lowercase letters only, if you are allowed to replace no more than ‘k’ letters with any letter, 
find the length of the longest substring having the same letters after replacement.

Example 1:

Input: String="aabccbb", k=2  
Output: 5  
Explanation: Replace the two 'c' with 'b' to have a longest repeating substring "bbbbb".

Example 2:

Input: String="abbcb", k=1  
Output: 4  
Explanation: Replace the 'c' with 'b' to have a longest repeating substring "bbbb".

Example 3:

Input: String="abccde", k=1  
Output: 3  
Explanation: Replace the 'b' or 'd' with 'c' to have the longest repeating substring "ccc".

*/


function longestRepeatingSubstring($str, $k) {
    $maxRepeat = 0;
    $maxCount = 0;
    $charCount = [];
    $start = 0;
    
    for ($end = 0; $end < strlen($str); $end++) {
        $char = $str[$end];
        if (!isset($charCount[$char])) {
            $charCount[$char] = 0;
        }
        $charCount[$char]++;
        $maxCount = max($maxCount, $charCount[$char]);
        
        // If the current window size - maxCount > k, shrink the window
        if ($end - $start + 1 - $maxCount > $k) {
            $charCount[$str[$start]]--;
            $start++;
        }
        
        $maxRepeat = max($maxRepeat, $end - $start + 1);
    }
    
    return $maxRepeat;
}

// Example usage:
$input1 = "aabccbb";
$k1 = 2;
echo "Example 1: " . longestRepeatingSubstring($input1, $k1) . "\n";

$input2 = "abbcb";
$k2 = 1;
echo "Example 2: " . longestRepeatingSubstring($input2, $k2) . "\n";

$input3 = "abccde";
$k3 = 1;
echo "Example 3: " . longestRepeatingSubstring($input3, $k3) . "\n";

?>