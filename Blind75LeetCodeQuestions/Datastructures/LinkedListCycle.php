<?php

/*

Given the head of a Singly LinkedList, write a function to determine if the LinkedList has a cycle in it or not.

*/

class ListNode {
    public $value;
    public $next;
    
    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

function hasCycle($head) {
    if ($head == null || $head->next == null) {
        return false;
    }
    
    $slow = $head;
    $fast = $head;
    
    while ($fast != null && $fast->next != null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
        
        if ($slow === $fast) {
            return true; // Cycle detected
        }
    }
    
    return false; // No cycle detected
}

// Example usage:
// Create a linked list with a cycle: 1 -> 2 -> 3 -> 4 -> 5 -> 3
$head = new ListNode(1);
$head->next = new ListNode(2);
$head->next->next = new ListNode(3);
$head->next->next->next = new ListNode(4);
$head->next->next->next->next = new ListNode(5);
$head->next->next->next->next->next = $head->next->next; // Cycle back to node 3

// Check if the linked list has a cycle
$result = hasCycle($head);
echo $result ? "The linked list has a cycle." : "The linked list doesn't have a cycle.";


?>