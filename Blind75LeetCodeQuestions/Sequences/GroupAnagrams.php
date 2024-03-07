<?php


/*

Problem Statement

Given a list of strings, the task is to group the anagrams together.

An anagram is a word or phrase formed by rearranging the letters of another, such as "cinema", formed from "iceman".

Example Generation

Example 1:
Input: ["dog", "god", "hello"]
Output: [["dog", "god"], ["hello"]]
Justification: "dog" and "god" are anagrams, so they are grouped together. "hello" does not have any anagrams in the list, so it is in its own group.

Example 2:
Input: ["listen", "silent", "enlist"]
Output: [["listen", "silent", "enlist"]]
Justification: All three words are anagrams of each other, so they are grouped together.

Example 3:
Input: ["abc", "cab", "bca", "xyz", "zxy"]
Output: [["abc", "cab", "bca"], ["xyz", "zxy"]]
Justification: "abc", "cab", and "bca" are anagrams, as are "xyz" and "zxy".

*/

function groupAnagrams($strs) {
    $groups = [];
    
    foreach ($strs as $str) {
        // Sort the characters of the word
        $sorted = str_split($str);
        sort($sorted);
        $sortedKey = implode('', $sorted);
        
        // Add the word to the corresponding group
        $groups[$sortedKey][] = $str;
    }
    
    // Convert the groups hash map to a list of lists
    return array_values($groups);
}

$value = groupAnagrams(["dog", "god", "hello"]);

echo "Group Anagrams of ".implode(",",["dog", "god", "hello"]);
echo "\n";
foreach ($value as $key => $data) {
    echo "-----> ".implode(",", $data) . "\n";
}

echo "\n";

$value1 = groupAnagrams(["listen", "silent", "enlist"]);
echo "Group Anagrams of ".implode(",",["listen", "silent", "enlist"]);
echo "\n";
foreach ($value1 as $key1 => $data1) {
    echo "-----> ".implode(",", $data1) . "\n";
}

echo "\n";

$value2 = groupAnagrams(["abc", "cab", "bca", "xyz", "zxy"]);
echo "Group Anagrams of ".implode(",",["abc", "cab", "bca", "xyz", "zxy"]);
echo "\n";
foreach ($value2 as $key2 => $data2) {
    echo "-----> ".implode(",", $data2) . "\n";
}