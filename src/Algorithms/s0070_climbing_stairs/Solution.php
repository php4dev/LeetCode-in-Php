<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        if ($n == 2)
            return 2;
        else if ($n == 1)
            return 1;
        $a = 0;
        $b = 1;
        $c = 0;
        for ($i = 0; $i < $n; $i++) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
        return $c;
    }
}
