<?php

/*

Problem Statement
Given the head of a Singly LinkedList, reverse the LinkedList. Write a function to return the new head of the reversed LinkedList.

Try it yourself
Try solving this question here:

*/



class ListNode {
    public $value;
    public $next;
    
    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

function reverseLinkedList($head) {
    $prev = null;
    $current = $head;
    
    while ($current != null) {
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }
    
    // $prev now points to the new head of the reversed list
    return $prev;
}

// Example usage:
// Create a linked list: 1 -> 2 -> 3 -> 4 -> 5
$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);

// Output the Normal linked list
echo "Normal Linked List : "."\n";
$current = $head;
while ($current) {
    echo $current->value . " -> ";
    $current = $current->next;
}

// Reverse the linked list
$newHead = reverseLinkedList($head);

// Output the reversed linked list
echo "\n"."Reversed Linked List : "."\n";
$current = $newHead;
while ($current != null) {
    echo $current->value . " -> ";
    $current = $current->next;
}




?>