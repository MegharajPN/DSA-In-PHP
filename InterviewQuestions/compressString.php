<?php

/*

Q2. Consider a string, S, that is a series of characters, each followed by its frequency as an integer. 
The string is not compressed correctly, so there may be multiple occurrences of the same character. 
A properly compressed string will consist of one instance of each character in alphabetical order followed by the 
total count of that character within the string.

*/


function compressString($s) {
    $freq = [];
    $result = '';

    // Count the frequency of each character
    for ($i = 0; $i < strlen($s); $i += 2) {
        $char = $s[$i];
        $count = intval($s[$i + 1]);
        if (isset($freq[$char])) {
            $freq[$char] += $count;
        } else {
            $freq[$char] = $count;
        }
    }

    // Output characters in alphabetical order
    ksort($freq);
    foreach ($freq as $char => $count) {
        $result .= $char . $count;
    }

    return $result;
}

// Example usage:
$input = "a3b2c1a2";
echo compressString($input);  // Output: "a5b2c1"

