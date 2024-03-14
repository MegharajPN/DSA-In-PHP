<?php

/*

Problem Statement
Given a 2D array (i.e., a matrix) containing only 1s (land) and 0s (water), count the number of islands in it.

An island is a connected set of 1s (land) and is surrounded by either an edge or 0s (water). 
Each cell is considered connected to other cells horizontally or vertically (not diagonally).

Example 1

Input: matrix = [[0, 1, 1, 1, 0],[0, 0, 0, 1, 1],[0, 1, 1, 1, 0],[0, 1, 1, 0, 0],[0, 0, 0, 0, 0]]

*/


class Solution
{
    function numIslands($grid)
    {
        if (empty($grid)) {
            return 0;
        }

        $numRows = count($grid);
        $numCols = count($grid[0]);
        $numIslands = 0;

        for ($i = 0; $i < $numRows; $i++) {
            for ($j = 0; $j < $numCols; $j++) {
                if ($grid[$i][$j] == '1') {
                    $this->dfs($grid, $i, $j);
                    $numIslands++;
                }
            }
        }

        return $numIslands;
    }

    function dfs(&$grid, $row, $col)
    {
        $numRows = count($grid);
        $numCols = count($grid[0]);

        // Check boundary conditions and if current cell is land
        if ($row < 0 || $row >= $numRows || $col < 0 || $col >= $numCols || $grid[$row][$col] != '1') {
            return;
        }

        // Mark current cell as visited
        $grid[$row][$col] = '0';

        // Visit adjacent cells recursively
        $this->dfs($grid, $row + 1, $col); // Down
        $this->dfs($grid, $row - 1, $col); // Up
        $this->dfs($grid, $row, $col + 1); // Right
        $this->dfs($grid, $row, $col - 1); // Left
    }
}

// Example usage:
$grid = [[0, 1, 1, 1, 0], [0, 0, 0, 1, 1], [0, 1, 1, 1, 0], [0, 1, 1, 0, 0], [0, 0, 0, 0, 0]];
$grid2 = [[1, 1, 1, 0, 0], [0, 1, 0, 0, 1], [0, 0, 1, 1, 0], [0, 0, 1, 0, 0], [0, 0, 1, 0, 0]];

$sol = new Solution();
echo $sol->numIslands($grid); // Output: 1
echo "\n";
echo $sol->numIslands($grid2); // Output: 1
