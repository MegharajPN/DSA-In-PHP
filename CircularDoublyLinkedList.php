<?php


// A circular doubly linked list is a data structure where each node has a data field and two pointers: 
// one to the next node and one to the previous node. Unlike a regular doubly linked list, 
// the last node's next pointer points back to the first node, and the first node's previous pointer points to the last node, 
// forming a circular structure. 
// This circularity enables efficient traversal from any node in both forward and backward directions.

class Node {
    public $data; // Data stored in the node
    public $prev; // Reference to the previous node
    public $next; // Reference to the next node

    public function __construct($data) {
        $this->data = $data;
        $this->prev = null; // Initially, there is no previous node
        $this->next = null; // Initially, there is no next node
    }
}

class CircularDoublyLinkedList {
    public $head; // Reference to the first node in the list

    public function __construct() {
        $this->head = null; // Initially, the list is empty
    }

    // Method to append a new node to the end of the list
    public function append($data) {
        $newNode = new Node($data); // Create a new node with the given data
        if ($this->head === null) { // If the list is empty
            $newNode->next = $newNode; // Set the next of the new node to itself
            $newNode->prev = $newNode; // Set the previous of the new node to itself
            $this->head = $newNode; // Set the new node as the head
        } else {
            $lastNode = $this->head->prev; // Get the last node in the list
            $lastNode->next = $newNode; // Set the next of the last node to the new node
            $newNode->prev = $lastNode; // Set the previous of the new node to the last node
            $newNode->next = $this->head; // Set the next of the new node to the head
            $this->head->prev = $newNode; // Set the previous of the head to the new node
        }
    }

    // Method to print the list forward
    public function printForward() {
        $current = $this->head; // Start from the head
        while ($current->next !== $this->head) { // Traverse until the head is reached again
            echo $current->data . " -> "; // Print the data of the current node
            $current = $current->next; // Move to the next node
        }
        echo $current->data . " -> "; // Print the data of the last node
        echo "(Head)\n"; // Indicate the head
    }

    // Method to print the list backward
    public function printBackward() {
        $current = $this->head->prev; // Start from the last node
        while ($current->prev !== $this->head->prev) { // Traverse until the last node is reached again
            echo $current->data . " -> "; // Print the data of the current node
            $current = $current->prev; // Move to the previous node
        }
        echo $current->data . " -> "; // Print the data of the first node
        echo "(Tail)\n"; // Indicate the tail
    }
}

// Example usage:

// Create a new circular doubly linked list
$cdll = new CircularDoublyLinkedList();

// Append some nodes to the list
$cdll->append(3);
$cdll->append(5);
$cdll->append(13);
$cdll->append(2);

// Print the list forward
echo "Forward traversal:\n";
$cdll->printForward();

// Print the list backward
echo "Backward traversal:\n";
$cdll->printBackward();
