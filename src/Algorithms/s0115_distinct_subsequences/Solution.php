<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Integer
     */
    function numDistinct($s, $t) {
        $tLength = strlen($t);
        $match = array_fill(0, $tLength + 1, 0);
        $match[0] = 1;
        for ($i = 0; $i < strlen($s); $i++) {
            for ($j = $tLength; $j > 0; $j--) {
                if ($s[$i] == $t[$j - 1]) {
                    $match[$j] += $match[$j - 1];
                }
            }
        }
        return $match[$tLength];
    }
}
