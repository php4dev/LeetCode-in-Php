<?php

// #Medium #Top_Interview_Questions #Math #Udemy_Integers
// #2024_01_16_Time_7_ms_(67.94%)_Space_19.5_MB_(33.82%)

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $rev = 0;
        while ($x != 0) {
            $rev = ($rev * 10) + ($x % 10);
            $x = intval($x / 10);
        }
        if (intval($rev) > 2147483647 || intval($rev) < -2147483647) return 0;
        return intval($rev);
    }
}
