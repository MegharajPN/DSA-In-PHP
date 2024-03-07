<?php

/*

Problem Statement
You are given an array prices where prices[i] is the price of a given stock on the day.

You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.

Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.

Examples
Input: [3, 2, 6, 5, 0, 3]
Expected Output: 4
Justification: Buy the stock on day 2 (price = 2) and sell it on day 3 (price = 6). Profit = 6 - 2 = 4.
Input: [8, 6, 5, 2, 1]
Expected Output: 0
Justification: Prices are continuously dropping, so no profit can be made.
Input: [1, 2]
Expected Output: 1
Justification: Buy on day 1 (price = 1) and sell on day 2 (price = 2). Profit = 2 - 1 = 1.
*/

function MaxDayProfit($arr)
{
    $profits = [];

    for ($i = 0; $i < count($arr); $i++) {
        if ($i != (count($arr) - 1)) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$j] > $arr[$i]) {
                    $difference =  $arr[$j]  - $arr[$i];
                    array_push($profits, $difference);
                }
            }
        }
    }
     
    $maxValue = count($profits)?max($profits):0;

    return $maxValue;
}

$value = MaxDayProfit([3, 2, 6, 5, 0, 3]);
echo "Max Value is : " . $value . "\n";

$value1 = MaxDayProfit([8, 6, 5, 2, 1]);
echo "Max Value is : " . $value1 . "\n";

$value2 = MaxDayProfit([1, 2]);
echo "Max Value is : " . $value2 . "\n";
