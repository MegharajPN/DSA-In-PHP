<?php

/*

Q3. Write a  Program to Change Decimal Number to Binary?

*/

function decimalToBinary($decimal) {
    $binary = '';

    // Handle the case of 0 separately
    if ($decimal == 0) {
        return '0';
    }

    while ($decimal > 0) {
        // Get the remainder when dividing by 2
        $remainder = $decimal % 2;
        // Prepend the remainder to the binary representation
        $binary = $remainder . $binary;
        // Divide the number by 2
        $decimal = intval($decimal / 2);
    }

    return $binary;
}

// Example usage:
$decimalNumber = 10;
echo "Binary representation of $decimalNumber is: " . decimalToBinary($decimalNumber);  // Output: 1010

?>