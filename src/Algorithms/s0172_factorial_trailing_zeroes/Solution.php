<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function trailingZeroes($n) {
        $res = 0;
        while ($n >= 5) {
            $n = intval($n / 5);
            $res += $n;
        }
        return $res;
    }
}
