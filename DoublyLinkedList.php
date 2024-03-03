<?php

// A doubly linked list is a type of linked list where each node contains a data element and two references or 
// pointers, one pointing to the next node in the sequence (forward direction) and another pointing to the previous node 
// (backward direction).
class Node
{
    public $data; // Data stored in the node
    public $prev; // Reference to the previous node
    public $next; // Reference to the next node

    public function __construct($data)
    {
        $this->data = $data;
        $this->prev = null; // Initially, there is no previous node
        $this->next = null; // Initially, there is no next node
    }
}

class DoublyLinkedList
{
    public $head; // Reference to the first node in the list

    public function __construct()
    {
        $this->head = null; // Initially, the list is empty
    }

    // Method to append a new node to the end of the list
    public function append($data)
    {
        $newNode = new Node($data); // Create a new node with the given data
        if ($this->head === null) { // If the list is empty
            $this->head = $newNode; // Set the new node as the head
        } else {
            $current = $this->head;
            while ($current->next !== null) { // Traverse to the last node
                $current = $current->next;
            }
            $current->next = $newNode; // Set the next of the last node to the new node
            $newNode->prev = $current; // Set the previous of the new node to the last node
        }
    }

    // Method to print the list forward
    public function printForward()
    {
        $current = $this->head; // Start from the head
        while ($current !== null) { // Traverse until the end of the list
            echo $current->data . " -> "; // Print the data of the current node
            $current = $current->next; // Move to the next node
        }
        echo "null\n"; // End of the list
    }

    // Method to print the list backward
    public function printBackward()
    {
        $current = $this->head; // Start from the head
        while ($current->next != null) { // Traverse to the last node
            $current = $current->next;
        }
        while ($current !== null) { // Traverse backward from the last node
            echo $current->data . " -> "; // Print the data of the current node
            $current = $current->prev; // Move to the previous node
        }
        echo "null\n"; // End of the list
    }
}

// Example usage:

// Create a new doubly linked list
$dll = new DoublyLinkedList();

// Append some nodes to the list
$dll->append(3);
$dll->append(5);
$dll->append(13);
$dll->append(2);

// Print the list forward
echo "Forward traversal:\n";
$dll->printForward();

// Print the list backward
echo "Backward traversal:\n";
$dll->printBackward();
