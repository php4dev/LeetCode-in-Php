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
     * @param Integer $sum
     * @return Integer[][]
     */
    function pathSum($root, $sum) {
        $res = [];
        $temp = [];

        $curSum = 0;
        self::pathSumUtil($root, $sum, $curSum, $res, $temp);

        return $res;
    }

    function pathSumUtil($root, $sum, $curSum, &$res, &$temp) {

        if ($root == null)
            return;
        array_push($temp, $root->val);
        if ($root->left == null && $root->right == null) {
            $curSum = $curSum + $root->val;

            if ($sum == $curSum) {
                array_push($res, $temp);
            }
        }

        $curSum = $curSum + $root->val;
        self::pathSumUtil($root->left, $sum, $curSum, $res, $temp);
        self::pathSumUtil($root->right, $sum, $curSum, $res, $temp);
        array_pop($temp);
    }
}
