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
     * @param Integer $n
     * @return TreeNode[]
     */
    function generateTrees($n) {
        if ($n == 0) {
            return [];
        }
        $results = self::helper(1, $n);
        return $results;
    }

    function helper($begin, $end) {
        $results = [];
        if ($begin > $end) {
            array_push($results, null);
            return $results;
        }
        if ($begin == $end) {
            array_push($results, new TreeNode($begin));
            return $results;
        }

        for ($i = $begin; $i <= $end; $i++) {
            $lstLeft = self::helper($begin, $i - 1);
            $lstRight = self::helper($i + 1, $end);

            for ($j = 0; $j < count($lstLeft); $j++) {
                $lNode = $lstLeft[$j];
                for ($k = 0; $k < count($lstRight); $k++) {
                    $rNode = $lstRight[$k];
                    $root = new TreeNode($i);
                    $root->left = $lNode;
                    $root->right = $rNode;
                    array_push($results, $root);
                }
            }
        }
        return $results;
    }
}
