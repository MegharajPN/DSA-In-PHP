<?php


// A queue is another fundamental data structure in computer science, following the First In, First Out (FIFO) principle. 
// It resembles a line of people waiting for a service where the person who arrives first is served first. 
// In a queue, elements are inserted at the rear (enqueue) and removed from the front (dequeue). 
// The main operations supported by a queue are:

// Enqueue: Add an element to the rear of the queue.
// Dequeue: Remove and return the element at the front of the queue.
// Front: Get the element at the front of the queue without removing it.
// Empty: Check if the queue is empty.

class Queue {
    private $queue; // Array to store queue elements
    private $front; // Index of the front element
    private $rear;  // Index of the rear element

    public function __construct() {
        $this->queue = [];
        $this->front = 0; // Initialize front as 0
        $this->rear = -1; // Initialize rear as -1 (empty queue)
    }

    public function enqueue($element) {
        $this->queue[++$this->rear] = $element; // Increment rear and insert element
    }

    public function dequeue() {
        if ($this->isEmpty()) {
            return null; // Queue underflow
        }
        $element = $this->queue[$this->front]; // Get front element
        unset($this->queue[$this->front++]); // Remove front element and increment front
        return $element; // Return front element
    }

    public function front() {
        if ($this->isEmpty()) {
            return null; // Queue is empty
        }
        return $this->queue[$this->front]; // Return front element
    }

    public function isEmpty() {
        return $this->front > $this->rear; // Check if front is greater than rear
    }

    public function display(){
        return implode(",",$this->queue); // Display the all queue items.
    }
}

// Example usage:

$queue = new Queue();

$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);

echo "Display all Queue: " . $queue->display() . "\n";

echo "Front element: " . $queue->front() . "\n"; // Output: 10

echo "Dequeue: " . $queue->dequeue() . "\n"; // Output: 10
echo "Dequeue: " . $queue->dequeue() . "\n"; // Output: 20

echo "Is queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "\n"; // Output: No

echo "Dequeue: " . $queue->dequeue() . "\n"; // Output: 30
echo "Is queue empty? " . ($queue->isEmpty() ? "Yes" : "No") . "\n"; // Output: Yes

echo "Front element: " . ($queue->front() ?? "Queue is empty") . "\n"; // Output: Queue is empty

?>