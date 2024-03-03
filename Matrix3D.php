<?php

// Define the dimensions of the 3D array
$depth = 2; // Number of "layers"
$rows = 3;  // Number of rows in each layer
$columns = 4; // Number of columns in each layer

// Initialize the 3D array
$array3D = [];

// Populate the 3D array with values
for ($k = 0; $k < $depth; $k++) {
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            // Generate random values for demonstration purposes
            $array3D[$k][$i][$j] = rand(1, 100);
        }
    }
}

// Display the 3D array
echo "3D Array values:\n";
for ($k = 0; $k < $depth; $k++) {
    echo "Layer $k:\n";
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            echo $array3D[$k][$i][$j] . "\t";
        }
        echo "\n";
    }
    echo "\n";
}

?>
