<?php

/* 

Determine the depth (or height) of a binary tree, which refers to the number of nodes along the longest path from the 
root node to the farthest leaf node. If the tree is empty, the depth is 0.

Example:

Input
     1
    / \
   2   3
  / \
 4   5
Output: 3
Explanation: The longest path is 1->2->4 or 1->2->5 with 3 nodes.

Input:
1
 \
  2
   \
    3
Expected Output: 3
Justification: There's only one path 1->2->3 with 3 nodes.
Input:
    1
   / \
  2   3
 / \
4   7
     \
      9
Expected Output: 4
Justification: The longest path is 1->2->7->9 with 4 nodes.

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

function maxDepth($root) {
    if ($root == null) {
        return 0;
    }
    
    // Calculate the depth of the left and right subtrees recursively
    $leftDepth = maxDepth($root->left);
    $rightDepth = maxDepth($root->right);
    
    // Return the maximum depth of the left and right subtrees, plus 1 (for the current node)
    return max($leftDepth, $rightDepth) + 1;
}

// Example usage:
$tree1 = new TreeNode(
    1,
    new TreeNode(2, new TreeNode(4), new TreeNode(5)),
    new TreeNode(3)
);
echo "Input:\n";
echo "     1\n";
echo "    / \\\n";
echo "   2   3\n";
echo "  / \n";
echo " 4   5\n";
echo "Expected Output: 3\n";
echo "Actual Output: " . maxDepth($tree1) . "\n\n";

$tree2 = new TreeNode(
    1,
    null,
    new TreeNode(2, null, new TreeNode(3))
);
echo "Input:\n";
echo "  1\n";
echo "   \\\n";
echo "    2\n";
echo "     \\\n";
echo "      3\n";
echo "Expected Output: 3\n";
echo "Actual Output: " . maxDepth($tree2) . "\n\n";

$tree3 = new TreeNode(
    1,
    new TreeNode(2, new TreeNode(4), new TreeNode(7, null, new TreeNode(9))),
    new TreeNode(3)
);
echo "Input:\n";
echo "    1\n";
echo "   / \\\n";
echo "  2   3\n";
echo " / \\\n";
echo "4   7\n";
echo "     \\\n";
echo "      9\n";
echo "Expected Output: 4\n";
echo "Actual Output: " . maxDepth($tree3) . "\n";


?>