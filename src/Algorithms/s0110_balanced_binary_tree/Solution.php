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
     * @return Boolean
     */
    function isBalanced($root) {
        return $root == null || self::checkDepth($root) != -1;
    }

    function checkDepth($root) {
        $lh = $root->left == null ? 0 : self::checkDepth($root->left);
        $rh = $root->right == null ? 0 : self::checkDepth($root->right);
        // Left subtree or right subtree is unbalanced
        if ($lh == -1 || $rh == -1) return -1;
        // This tree is unbalanced
        if ($lh - $rh > 1 || $lh - $rh < -1) return -1;
        // Return depth of this tree
        return max($lh, $rh) + 1;
    }
}
