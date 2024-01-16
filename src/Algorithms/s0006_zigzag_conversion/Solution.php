<?php

// #Medium #String #2024_01_16_Time_10_ms_(90.40%)_Space_19.5_MB_(58.08%)

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if ($numRows == 1) return $s;

        $ret = "";
        $n = strlen($s);
        $cycleLen = 2 * $numRows - 2;

        for ($i = 0; $i < $numRows; $i++) {
            for ($j = 0; $j + $i < $n; $j += $cycleLen) {
                $ret = $ret . $s[$j + $i];
                if ($i != 0 && $i != $numRows - 1 && $j + $cycleLen - $i < $n)
                    $ret = $ret . $s[$j + $cycleLen - $i];
            }
        }
        return $ret;
    }
}
