<?php

/*

Problem Statement:
Given a matrix m x n that represents the height of each unit cell in a Island, determine which cells can have water flow to 
both the Pacific and Atlantic oceans. The Pacific ocean touches the left and top edges of the continent, while the Atlantic 
ocean touches the right and bottom edges.

From each cell, water can only flow to adjacent cells (top, bottom, left, or right) if the adjacent cell's height is less 
than or equal to the current cell's height.

We need to return a list of grid coordinates where water can flow to both the Pacific and Atlantic oceans.

Example 1:

Input: [[1,2,3],[4,5,6],[7,8,9]]

Expected Output: [[0,2],[1,2],[2,0],[2,1],[2,2]]

Justification: The cells that can flow to both the Pacific and Atlantic oceans are

[0,2]:

To Pacific Ocean: Directly from [0,2] since it's on the top border.
To Atlantic Ocean: [0,2] -> [1,2] -> [2,2].
[1,2]:

To Pacific Ocean: [1,2] -> [0,2].
To Atlantic Ocean: [1,2] -> [2,2].
[2,0]:

To Pacific Ocean: Directly from [2,0] since it's on the left border.
To Atlantic Ocean: [2,0] -> [2,1].
[2,1]:

To Pacific Ocean: [2,1] -> [2,0].
To Atlantic Ocean: [2,1] -> [2,2].
[2,2]:

To Pacific Ocean: [2,2] -> [1,2] -> [0,2].
To Atlantic Ocean: Directly from [2,2] since it's on the bottom-right corner.

Example 2:

Input: [[10,10,10],[10,1,10],[10,10,10]]
Expected Output: [[0,0],[0,1],[0,2],[1,0],[1,2],[2,0],[2,1],[2,2]]
Justification: The water can flow to both oceans from all cells except from the central cell [1,1].

Example 3:

Input: [[5,4,3],[4,3,2],[3,2,1]]
Expected Output: [[0,0],[0,1],[0,2],[1,0],[2,0]]
Justification: All the leftmost cells can have water flowing to both oceans. Similarly, top cells also satisfy the criteria.

*/

function pacificAtlantic($matrix)
{
    if (empty($matrix)) return [];

    $rows = count($matrix);
    $cols = count($matrix[0]);
    $pacific = array_fill(0, $rows, array_fill(0, $cols, false));
    $atlantic = array_fill(0, $rows, array_fill(0, $cols, false));
    $result = [];

    // Perform DFS starting from the borders and mark reachable cells
    for ($i = 0; $i < $rows; $i++) {
        dfs($matrix, $pacific, $i, 0, $rows, $cols);
        dfs($matrix, $atlantic, $i, $cols - 1, $rows, $cols);
    }

    for ($j = 0; $j < $cols; $j++) {
        dfs($matrix, $pacific, 0, $j, $rows, $cols);
        dfs($matrix, $atlantic, $rows - 1, $j, $rows, $cols);
    }

    // Find cells reachable from both oceans
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($pacific[$i][$j] && $atlantic[$i][$j]) {
                $result[] = [$i, $j];
            }
        }
    }

    return $result;
}

function dfs(&$matrix, &$ocean, $i, $j, $rows, $cols)
{
    $ocean[$i][$j] = true;
    $directions = [[0, 1], [0, -1], [1, 0], [-1, 0]];

    foreach ($directions as $dir) {
        $x = $i + $dir[0];
        $y = $j + $dir[1];
        if (
            $x >= 0 && $x < $rows && $y >= 0 && $y < $cols &&
            !$ocean[$x][$y] && $matrix[$x][$y] >= $matrix[$i][$j]
        ) {
            dfs($matrix, $ocean, $x, $y, $rows, $cols);
        }
    }
}

// Example usage:
$matrix1 = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
echo "Input: \n";
var_export($matrix1);
echo "\n";
echo "Expected Output: [[0,2],[1,2],[2,0],[2,1],[2,2]]\n";
echo "Actual Output: ";
var_export(pacificAtlantic($matrix1));
echo "\n\n";

$matrix2 = [
    [10, 10, 10],
    [10, 1, 10],
    [10, 10, 10]
];
echo "Input: \n";
var_export($matrix2);
echo "\n";
echo "Expected Output: [[0,0],[0,1],[0,2],[1,0],[1,2],[2,0],[2,1],[2,2]]\n";
echo "Actual Output: ";
var_export(pacificAtlantic($matrix2));
echo "\n\n";

$matrix3 = [
    [5, 4, 3],
    [4, 3, 2],
    [3, 2, 1]
];
echo "Input: \n";
var_export($matrix3);
echo "\n";
echo "Expected Output: [[0,0],[0,1],[0,2],[1,0],[2,0]]\n";
echo "Actual Output: ";
var_export(pacificAtlantic($matrix3));
echo "\n";
