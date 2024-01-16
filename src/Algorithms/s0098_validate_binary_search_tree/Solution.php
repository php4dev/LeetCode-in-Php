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
    function isValidBST($root) {
        return self::helper($root, null, null);
    }

    function helper($node, $min, $max) {
        if ($node == null) return true;
        if (($min != null && $node->val <= $min->val) || ($max != null && $node->val >= $max->val)) return false;
        return self::helper($node->left, $min, $node) && self::helper($node->right, $node, $max);
    }
}
