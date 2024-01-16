<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function grayCode($n) {
        $ans = [];
        self::subGray($n, $ans);
        return $ans;
    }

    function subGray($n, &$ans) {
        if ($n == 0) {
            array_push($ans, 0);
        } else {
            // left half
            self::subGray($n - 1, $ans);
            // double
            $offset = count($ans);
            for ($i = $offset - 1; $i >= 0; $i--) {
                array_push($ans, $ans[$i] + $offset);
            }
        }
    }
}
