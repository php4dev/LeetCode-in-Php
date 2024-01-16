<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n) {
        $dp = array_fill(0, $n + 1, 0);;
        $dp[0] = $dp[1] = 1; // null is also a BST;

        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = 0;
            for ($j = 0; $j < $i; $j++) {
                $dp[$i] += $dp[$j] * $dp[$i - $j - 1];
            }
        }
        return $dp[$n];
    }
}
