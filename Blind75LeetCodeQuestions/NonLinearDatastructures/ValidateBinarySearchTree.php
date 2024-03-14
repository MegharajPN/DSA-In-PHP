<?php

/*

Problem Statement

Determine if a given binary tree is a binary search tree (BST). In a BST, for each node:

All nodes to its left have values less than the node's value.
All nodes to its right have values greater than the node's value.
Example Generation

Example 1:

Input: [5,3,7]
Expected Output: true
Justification: The left child of the root (3) is less than the root, 
and the right child of the root (7) is greater than the root. Hence, it's a BST.

Example 2:

Input: [5,7,3]
Expected Output: false
Justification: The left child of the root (7) is greater than the root, making it invalid.

Example 3:

Input: [10,5,15,null,null,12,20]
Expected Output: true
Justification: Each subtree of the binary tree is a valid binary search tree. 
So, a whole binary tree is a valid binary search tree.

*/

class TreeNode {
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function isValidBST($root) {
    // Helper function to recursively check if the subtree is a valid BST
    function helper($node, $min, $max) {
        // Base case: if node is null, it's a valid BST
        if ($node === null) {
            return true;
        }
        
        // Check if current node's value is within the valid range
        if ($node->val <= $min || $node->val >= $max) {
            return false;
        }
        
        // Check left subtree with updated max value
        // Check right subtree with updated min value
        return helper($node->left, $min, $node->val) && helper($node->right, $node->val, $max);
    }
    
    // Start the recursion with initial min and max values
    return helper($root, PHP_INT_MIN, PHP_INT_MAX);
}

// Example usage:
// Create the binary tree
$root1 = new TreeNode(5);
$root1->left = new TreeNode(3);
$root1->right = new TreeNode(7);

$root2 = new TreeNode(5);
$root2->left = new TreeNode(7);
$root2->right = new TreeNode(3);

$root3 = new TreeNode(10);
$root3->left = new TreeNode(5);
$root3->right = new TreeNode(15);
$root3->right->left = new TreeNode(12);
$root3->right->right = new TreeNode(20);

// Test the examples
echo isValidBST($root1) ? "true\n" : "false\n";  // Output: true
echo isValidBST($root2) ? "true\n" : "false\n";  // Output: false
echo isValidBST($root3) ? "true\n" : "false\n";  // Output: true

?>