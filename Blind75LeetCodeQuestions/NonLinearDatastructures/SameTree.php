<?php

/*

Problem Statement
Given the roots of two binary trees 'p' and 'q', write a function to check if they are the same or not.

Two binary trees are considered the same if they met following two conditions:

Both tree are structurally identical.
Each corresponding node on both the trees have the same value.
Example 1:

Given the following two binary trees:

*/

class TreeNode {
    public $val;
    public $left;
    public $right;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

function isSameTree($p, $q) {
    // If both trees are null, they are the same
    if ($p == null && $q == null) {
        return true;
    }
    
    // If one of the trees is null but the other is not, they are not the same
    if ($p == null || $q == null) {
        return false;
    }
    
    // If the values of the current nodes are different, they are not the same
    if ($p->val != $q->val) {
        return false;
    }
    
    // Recursively check if the left and right subtrees are the same
    return isSameTree($p->left, $q->left) && isSameTree($p->right, $q->right);
}

// Example usage:
// Constructing trees from the given examples
// Example 1:
$p1 = new TreeNode(1, new TreeNode(2), new TreeNode(3));
$q1 = new TreeNode(1, new TreeNode(2), new TreeNode(3));
echo "Example 1:\n";
echo "Expected Output: true\n";
echo "Actual Output: " . (isSameTree($p1, $q1) ? 'true' : 'false') . "\n\n";

// Example 2:
$p2 = new TreeNode(1, new TreeNode(2), null);
$q2 = new TreeNode(1, null, new TreeNode(2));
echo "Example 2:\n";
echo "Expected Output: false\n";
echo "Actual Output: " . (isSameTree($p2, $q2) ? 'true' : 'false') . "\n\n";

// Example 3:
$p3 = new TreeNode(1, new TreeNode(2), new TreeNode(3));
$q3 = new TreeNode(1, new TreeNode(4), new TreeNode(3));
echo "Example 3:\n";
echo "Expected Output: false\n";
echo "Actual Output: " . (isSameTree($p3, $q3) ? 'true' : 'false') . "\n";



?>