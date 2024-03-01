<?php

// Using For Loop

// function fibonacci($n) {
//     $fibonacci_sequence = array();
//     $fibonacci_sequence[0] = 0;
//     $fibonacci_sequence[1] = 1;
    
//     for ($i = 2; $i <= $n; $i++) {
//         $fibonacci_sequence[$i] = $fibonacci_sequence[$i - 1] + $fibonacci_sequence[$i - 2];
//     }
    
//     return $fibonacci_sequence;
// }

// $n = 5;
// $fibonacci_sequence = fibonacci($n);

// for ($i = 0; $i <= $n; $i++) {
//     echo $fibonacci_sequence[$i] . "\n";
// }



// Using Recurssion

function fibonacciRecurrsion($n) {
    if ($n <= 1) {
        return $n;
    } else {
        return fibonacciRecurrsion($n - 1) + fibonacciRecurrsion($n - 2);
    }
}

$n = 10;
for ($i = 0; $i <= $n; $i++) {
    echo fibonacciRecurrsion($i) . "\n";
}

?>
