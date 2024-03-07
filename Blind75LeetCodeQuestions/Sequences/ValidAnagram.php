<?php

/*

Problem Statement
Given two strings s and t, return true if t is an anagram of s, and false otherwise.

An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, typically using all the original letters exactly once.

Example 1:

Input: s = "listen", t = "silent"
Output: true
Example 2:

Input: s = "rat", t = "car"
Output: false
Example 3:

Input: s = "hello", t = "world"
Output: false

*/

function is_anagram($string_1, $string_2)
{
    if (count_chars($string_1, 1) == count_chars($string_2, 1))
        return "true";
    else
        return "false";
}

 
$value = is_anagram('listen', 'silent');
print_r( $value. "\n");
$value1 = is_anagram('rat', 'car');
print_r( $value1. "\n");
$value2 = is_anagram('hello', 'world');
print_r( $value2. "\n");
