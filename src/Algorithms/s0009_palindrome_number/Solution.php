<?php

// #Easy #Math #Udemy_Integers #2024_01_16_Time_25_ms_(72.15%)_Space_19.6_MB_(10.33%)

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if ($x < 0) return false;
        $i = 0;
        $rev = 0;
        $ori = $x;
        for ($i = 10; $x > 0; $x = intval($x / 10)) {
            $rev *= 10;
            $rev += $x % $i;
        }
        return $rev == $ori;
    }
}
