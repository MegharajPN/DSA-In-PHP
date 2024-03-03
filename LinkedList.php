<?php


// A Linked List is a linear data structure where elements, called nodes, are stored in a sequence. 
// Unlike arrays, which store elements in contiguous memory locations, linked lists use pointers to connect nodes, 
// allowing for efficient insertion, deletion, and traversal operations.

// Each node in a linked list consists of two parts:

// Data: Holds the value of the element.
// Pointer (or Reference): Points to the next node in the sequence.
// Here's a basic explanation of Linked Lists:

// Singly Linked List: In a singly linked list, each node points to the next node in the sequence, 
// forming a unidirectional chain. The last node typically points to NULL, indicating the end of the list.

// Doubly Linked List: In a doubly linked list, each node has two pointers: one pointing to the next node 
// and another pointing to the previous node. This allows traversal in both forward and backward directions.

// Circular Linked List: In a circular linked list, the last node points back to the first node, 
// forming a circular structure. This can simplify certain operations and can be implemented using either 
// singly or doubly linked lists.

// Now, let's implement a simple singly linked list in PHP:


// In this example:

// The Node class represents a node in the linked list, containing a data field to hold the value and a next 
// field to point to the next node.
// The SinglyLinkedList class represents the linked list itself. It contains a head pointer to the first node in the list.
// The insertAtBeginning method inserts a new node with the given data at the beginning of the list.
// The printList method traverses the list and prints the data of each node.
// This implementation demonstrates the basic structure and operations of a singly linked list in PHP.

// class Node {
//     public $data;
//     public $next;

//     public function __construct($data) {
//         $this->data = $data;
//         $this->next = null;
//     }
// }

// class SinglyLinkedList {
//     public $head;

//     public function __construct() {
//         $this->head = null;
//     }

//     // Function to insert a new node at the beginning of the linked list
//     public function insertAtBeginning($data) {
//         $newNode = new Node($data);
//         $newNode->next = $this->head;
//         $this->head = $newNode;
//     }

//     // Function to print the linked list
//     public function printList() {
//         $current = $this->head;
//         while ($current !== null) {
//             echo $current->data . " ";
//             $current = $current->next;
//         }
//         echo "\n";
//     }
// }

// // Example usage:
// $ll = new SinglyLinkedList();
// $ll->insertAtBeginning(3);
// $ll->insertAtBeginning(5);
// $ll->insertAtBeginning(7);
// echo "Linked List: ";
// $ll->printList();


// another method 

class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

$node1 = new Node(3);
$node2 = new Node(5);
$node3 = new Node(13);
$node4 = new Node(2);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;

$currentNode = $node1;

/**
 * To Print the data
 */
while ($currentNode) {
    echo $currentNode->data . " -> ";
    $currentNode = $currentNode->next;
}

/**
 * To Print the data with Addresses
 * you can print the memory addresses of objects using the spl_object_id function. 
 * Here's the modified code to print the memory addresses of the nodes in the linked list:
 */
// while ($currentNode) {
//     echo "Data: " . $currentNode->data . ", Address: " . spl_object_id($currentNode) . " -> ";
//     $currentNode = $currentNode->next;
// }
echo "null";

?>