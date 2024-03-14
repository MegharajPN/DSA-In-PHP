<?php

/*

Given the root of a binary tree, invert it.

Example:

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

function invertTree($root) {
    if ($root == null) {
        return null;
    }
    
    // Swap the left and right children of the current node
    $temp = $root->left;
    $root->left = invertTree($root->right);
    $root->right = invertTree($temp);
    
    return $root;
}

function printTree($root, $level = 0, $isLeft = true) {
    if ($root == null) {
        return;
    }

    // Print the current node with indentation based on its level
    if ($level > 0) {
        echo str_repeat('    ', $level - 1);
        echo ($isLeft ? '└── ' : '├── ');
    }
    echo $root->val . "\n";

    // Print the left and right subtrees recursively
    printTree($root->left, $level + 1, true);
    printTree($root->right, $level + 1, false);
}

// Example usage:
$tree1 = new TreeNode(
    4,
    new TreeNode(2, new TreeNode(1), new TreeNode(3)),
    new TreeNode(7, new TreeNode(6), new TreeNode(9))
);
echo "Original Tree:\n";
printTree($tree1);
echo "\n";

$invertedTree = invertTree($tree1);

echo "Inverted Tree:\n";
printTree($invertedTree);
echo "\n";


?>