<?php

/*

Program to generate Fibonacci Triangle

*/

function generateFibonacciTriangle($rows) {
    $triangle = [];

    for ($i = 0; $i < $rows; $i++) {
        $row = [];
        for ($j = 0; $j <= $i; $j++) {
            if ($j == 0 || $j == 1) {
                $row[] = 1;
            } else {
                $row[] = $triangle[$i - 1][$j - 1] + $triangle[$i - 1][$j - 2];
            }
        }
        $triangle[] = $row;
    }

    return $triangle;
}

function printFibonacciTriangle($triangle) {
    foreach ($triangle as $row) {
        echo implode(" ", $row) . "\n";
    }
}

// Example usage:
$rows = 5;
$triangle = generateFibonacciTriangle($rows);
printFibonacciTriangle($triangle);





?>