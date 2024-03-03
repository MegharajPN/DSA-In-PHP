<?php

// Define the dimensions of the matrix
$rows = 3;
$columns = 3;

// Initialize the matrix (2D array)
$matrix = [];

// Populate the matrix with values
for ($i = 0; $i < $rows; $i++) {
    for ($j = 0; $j < $columns; $j++) {
        // Generate random values for demonstration purposes
        $matrix[$i][$j] = rand(1, 100);
    }
}

// Display the matrix
echo "Matrix values: "."\n";

for ($i = 0; $i < $rows; $i++) {
    echo implode(",",$matrix[$i]). "\n";
}


// for ($i = 0; $i < $rows; $i++) {
//     for ($j = 0; $j < $columns; $j++) {
//         echo $matrix[$i][$j] . "\t";
//     }
//     echo "\n";
// }

?>
