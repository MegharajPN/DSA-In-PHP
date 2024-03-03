<?php

// I can explain trees in data structures and algorithms (DSA) and provide a simple implementation in PHP.

// Trees are hierarchical data structures composed of nodes.
// Each node has a value and a list of references to its child nodes (also called "children").
// The top node of a tree is called the root node, and nodes without children are called leaf nodes. 
// The level of a node represents its distance from the root, with the root being at level 0.

class TreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    public $root;

    public function __construct() {
        $this->root = null;
    }

    public function insert($value) {
        $newNode = new TreeNode($value);
        if ($this->root === null) {
            $this->root = $newNode;
            return;
        }
        $this->insertRecursive($this->root, $newNode);
    }

    private function insertRecursive(&$node, &$newNode) {
        if ($node === null) {
            $node = $newNode;
            return;
        }
        if ($newNode->value < $node->value) {
            $this->insertRecursive($node->left, $newNode);
        } else {
            $this->insertRecursive($node->right, $newNode);
        }
    }

    public function inorderTraversal($node) {
        if ($node !== null) {
            $this->inorderTraversal($node->left);
            echo $node->value . " ";
            $this->inorderTraversal($node->right);
        }
    }
    
    public function displayTreeValues() {
        echo "Tree values (inorder traversal): ";
        $this->inorderTraversal($this->root);
        echo "\n";
    }

    public function displayTreeStructure() {
        if ($this->root === null) {
            echo "Tree is empty.\n";
            return;
        }
    
        $queue = [];
        array_push($queue, $this->root);
    
        echo "Display Tree Values In Tree Structure.\n";

        while (count($queue) > 0) {
            $levelSize = count($queue);
            for ($i = 0; $i < $levelSize; $i++) {
                $node = array_shift($queue);
                echo $node->value . " ";
                if ($node->left !== null) {
                    array_push($queue, $node->left);
                }
                if ($node->right !== null) {
                    array_push($queue, $node->right);
                }
            }
            echo "\n";
        }
    }
    
    
    public function search($value) {
        return $this->searchRecursive($this->root, $value);
    }

    private function searchRecursive($node, $value) {
        if ($node === null || $node->value === $value) {
            return $node;
        }
        if ($value < $node->value) {
            return $this->searchRecursive($node->left, $value);
        } else {
            return $this->searchRecursive($node->right, $value);
        }
    }
}

// Example usage:
$tree = new BinaryTree();
$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(2);
$tree->insert(4);
$tree->insert(6);
$tree->insert(8);

$tree->displayTreeValues();

$tree->displayTreeStructure();


$searchValue = 4;
$resultNode = $tree->search($searchValue);
if ($resultNode !== null) {
    echo "Value $searchValue found in the tree.";
} else {
    echo "Value $searchValue not found in the tree.";
}
?>
