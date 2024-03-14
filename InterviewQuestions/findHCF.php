<?php

/*
1. Write a program to find HCF of two numbers by without using recursion.

Input format:

The first line contains any 2 positive numbers separated by space.

Output format:

Print the HCF of given two numbers.

Sample Input:

70 15

Sample Output:

5
*/
function findHCF($num1, $num2)
{
    // Ensure $num1 is greater than or equal to $num2
    if ($num1 < $num2) {
        $temp = $num1;
        $num1 = $num2;
        $num2 = $temp;
    }

    while ($num2 != 0) {
        $remainder = $num1 % $num2;
        $num1 = $num2;
        $num2 = $remainder;
    }

    return $num1;
}

// Sample input
$input = "70 15";
list($num1, $num2) = explode(" ", $input);

// Calculate and output the HCF
echo findHCF($num1, $num2);
