<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function titleToNumber($s) {
        $len = strlen($s);
        $jinzhi = 1;
        $sum = 0;
        for ($i = $len - 1; $i >= 0; $i--) {

            $sum = $sum + (ord($s[$i]) - 64) * $jinzhi;
            $jinzhi = $jinzhi * 26;
        }
        return $sum;
    }
}
