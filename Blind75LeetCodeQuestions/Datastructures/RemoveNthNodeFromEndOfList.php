<?php

/*

Problem Statement
Given a linked list, remove the last nth node from the end of the list and return the head of the modified list.

Example 1:

Input: list = 1 -> 2 -> 3 -> 4 -> 5, n = 2
Expected Output: 1 -> 2 -> 3 -> 5
Justification: The 2nd node from the end is "4", so after removing it, the list becomes [1,2,3,5].

Example 2:

Input: list = 10 -> 20 -> 30 -> 40, n = 4
Expected Output: 20 -> 30 -> 40
Justification: The 4th node from the end is "10", so after removing it, the list becomes [20,30,40].

Example 3:

Input: list = 7 -> 14 -> 21 -> 28 -> 35, n = 3
Expected Output: 7 -> 14 -> 28 -> 35
Justification: The 3rd node from the end is "21", so after removing it, the list becomes [7,14,28,35].

Try it yourself

*/


class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

function removeNthFromEnd($head, $n) {
    $dummy = new ListNode(0);
    $dummy->next = $head;
    $length = 0;
    $first = $head;

    // Calculate the length of the list
    while ($first != null) {
        $length++;
        $first = $first->next;
    }

    // Calculate the position to remove
    $length -= $n;
    $first = $dummy;
    while ($length > 0) {
        $length--;
        $first = $first->next;
    }

    // Remove the node
    $first->next = $first->next->next;

    return $dummy->next;
}

// Function to print the linked list
function printList($node) {
    while ($node != null) {
        echo $node->val . " ";
        $node = $node->next;
    }
    echo "\n";
}

// Example usage: 1 -> 2 -> 3 -> 4 -> 5, n = 2
$list1 = new ListNode(1);
$list1->next = new ListNode(2);
$list1->next->next = new ListNode(3);
$list1->next->next->next = new ListNode(4);
$list1->next->next->next->next = new ListNode(5);

echo "Input: ";
printList($list1);

$n = 2;
$result = removeNthFromEnd($list1, $n);

echo "Output: ";
printList($result);

// Example usage 1: 10 -> 20 -> 30 -> 40, n = 4

$list2 = new ListNode(10);
$list2->next = new ListNode(20);
$list2->next->next = new ListNode(30);
$list2->next->next->next = new ListNode(40);

echo "Input: ";
printList($list2);

$n2 = 4;
$result2 = removeNthFromEnd($list2, $n2);

echo "Output: ";
printList($result2);


?>