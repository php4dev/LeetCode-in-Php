<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {
        if ($root == null)
            return 0;
        else if ($root->left == null)
            return self::minDepth($root->right) + 1;
        else if ($root->right == null)
            return self::minDepth($root->left) + 1;
        else
            return min(self::minDepth($root->left) + 1, self::minDepth($root->right) + 1);
    }
}
