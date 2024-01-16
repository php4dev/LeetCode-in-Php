<?php

/*
// Definition for a Node.
class Node {
    public $val;
    public $left;
    public $right;
    public $next;

    @param Integer $val 
    @param Node $left 
    @param Node $right 
    @param Node $next 
    function __construct($val, $left, $right, $next) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
        $this->next = $next;
    }
}
*/

class Solution {

    /**
     * @param Node $root
     * @return Node
     */
    function connect($root) {
        if ($root == null) {
            return null;
        }

        $start = $root;

        while ($start != null) {
            $temp = $start;
            $prev = new Node(-1, null, null, null);
            $start = null;

            while ($temp != null) {
                if ($start == null) {
                    $start = $temp->left == null ? $temp->right : $temp->left;
                }

                if ($temp->left != null) {
                    $prev->next = $temp->left;
                    $prev = $temp->left;
                }

                if ($temp->right != null) {
                    $prev->next = $temp->right;
                    $prev = $temp->right;
                }

                $temp = $temp->next;
            }
        }

        return $root;
    }
}
