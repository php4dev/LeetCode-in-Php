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
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $list = [];
        $stack = [];
        array_push($stack, $root);
        while (!empty($stack)) {
            $node = array_pop($stack);
            while ($node != null) {
                array_push($list, $node->val);
                array_push($stack, $node->right);
                $node = $node->left;
            }
        }
        return $list;
    }
}
