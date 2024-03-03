<?php

/* singly circular linked list is a type of linked list where each node contains a data element and a reference or pointer
to the next node in the sequence. However, unlike a traditional singly linked list, the last node of a 
singly circular linked list points back to the first node, forming a circle. 
This circular structure allows for continuous traversal from any node to any other node in the list.*/

class Node {
    public $data; // Data stored in the node
    public $next; // Reference to the next node

    public function __construct($data) {
        $this->data = $data;
        $this->next = null; // Initially, there is no next node
    }
}

class SinglyCircularLinkedList {
    public $head; // Reference to the first node in the list

    public function __construct() {
        $this->head = null; // Initially, the list is empty
    }

    // Method to append a new node to the end of the list
    public function append($data) {
        $newNode = new Node($data); // Create a new node with the given data
        if ($this->head === null) { // If the list is empty
            $this->head = $newNode; // Set the new node as the head
            $newNode->next = $newNode; // Make the new node point to itself to form a circle
        } else {
            $current = $this->head;
            while ($current->next !== $this->head) { // Traverse to the last node
                $current = $current->next;
            }
            $current->next = $newNode; // Set the next of the last node to the new node
            $newNode->next = $this->head; // Make the new node point back to the head to form a circle
        }
    }

    // Method to print the list
    public function printList() {
        if ($this->head === null) {
            echo "List is empty\n";
            return;
        }

        $current = $this->head; // Start from the head
        do {
            echo $current->data . " -> "; // Print the data of the current node
            $current = $current->next; // Move to the next node
        } while ($current !== $this->head); // Traverse until back to the head
        echo "head\n"; // End of the list, pointing back to the head
    }
}

// Example usage:

// Create a new singly circular linked list
$scll = new SinglyCircularLinkedList();

// Append some nodes to the list
$scll->append(3);
$scll->append(5);
$scll->append(13);
$scll->append(2);

// Print the list
$scll->printList();

?>