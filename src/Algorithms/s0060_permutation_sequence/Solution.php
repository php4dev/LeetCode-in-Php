<?php

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k) {
        $k--;
        $mod = 1;
        $list = [];
        for ($i = 1; $i <= $n; ++$i) {
            array_push($list, $i);
            $mod *= $i;
        }
        $sb = "";
        for ($i = 1; $i <= $n; ++$i) {
            $mod = intval($mod / ($n - $i + 1));
            $idx = intval($k / $mod);
            $sb .= array_splice($list, $idx, 1)[0];
            $k = $k % $mod;
        }
        return $sb;
    }
}
