<?php


// A stack is a fundamental data structure that follows the Last In, First Out (LIFO) principle. 
// It's similar to a stack of plates where you can only add or remove the top plate. 
// In a stack, elements are added and removed from the same end, known as the top of the stack.
// The main operations supported by a stack are:

// Push: Add an element to the top of the stack.
// Pop: Remove and return the element at the top of the stack.
// Peek or Top: Get the element at the top of the stack without removing it.
// IsEmpty: Check if the stack is empty.
// Here's an example implementation of a stack in PHP:

class Stack {
    private $stack; // Array to store stack elements
    private $top;   // Index of the top element

    public function __construct() {
        $this->stack = [];
        $this->top = -1; // Initialize top as -1 (empty stack)
    }

    public function push($element) {
        $this->stack[++$this->top] = $element; // Increment top and insert element
    }

    public function pop() {
        if ($this->isEmpty()) {
            return null; // Stack underflow
        }
        $element = $this->stack[$this->top]; // Get top element
        unset($this->stack[$this->top--]); // Remove top element and decrement top
        return $element; // Return top element
    }

    public function peek() {
        if ($this->isEmpty()) {
            return null; // Stack is empty
        }
        return $this->stack[$this->top]; // Return top element
    }

    public function isEmpty() {
        return $this->top === -1; // Check if top is -1 (empty stack)
    }
}

// Example usage:

$stack = new Stack();

$stack->push(10);
$stack->push(20);
$stack->push(30);

echo "Top element: " . $stack->peek() . "\n"; // Output: 30

echo "Pop: " . $stack->pop() . "\n"; // Output: 30
echo "Pop: " . $stack->pop() . "\n"; // Output: 20

echo "Is stack empty? " . ($stack->isEmpty() ? "Yes" : "No") . "\n"; // Output: No

echo "Pop: " . $stack->pop() . "\n"; // Output: 10
echo "Is stack empty? " . ($stack->isEmpty() ? "Yes" : "No") . "\n"; // Output: Yes

echo "Top element: " . ($stack->peek() ?? "Stack is empty") . "\n"; // Output: Stack is empty


?>