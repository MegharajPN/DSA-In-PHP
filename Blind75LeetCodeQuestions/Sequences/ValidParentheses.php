<?php

/*

Determine if an input string containing only the characters '(', ')', '{', '}', '[', and ']' is valid.
A string is considered valid if:

Open brackets must be closed by the same type of brackets.
Open brackets must be closed in the correct order.
Each close bracket has a corresponding open bracket of the same type.

Examples
Input: "(]"
Expected Output: false

Justification: The opening parenthesis '(' is not closed by its corresponding closing parenthesis.

Input: "{[]}"
Expected Output: true

Justification: The string contains pairs of opening and closing brackets in the correct order.

Input: "[{]}"
Expected Output: false

Justification: The opening square bracket '[' is closed by a curly brace '}', which is incorrect.

*/


function ValidParentheses($str){
    $stack = [];
    $mapping = [')' => '(', '}' => '{', ']' => '['];

        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            if (array_key_exists($char, $mapping)) {
                $top_element = array_pop($stack);
                if ($mapping[$char] !== $top_element) {
                    return false;
                }
            } else {
                array_push($stack, $char);
            }
        }
        
        return empty($stack);

}

$value = ValidParentheses("(]");
echo "Output : ".($value?"true":"false")."\n";

$value1 = ValidParentheses("{[]}");
echo "Output : ".($value1?"true":"false")."\n";

$value2 = ValidParentheses("[{]}");
echo "Output : ".($value2?"true":"false")."\n";



?>