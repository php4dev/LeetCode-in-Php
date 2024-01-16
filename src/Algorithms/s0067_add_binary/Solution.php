<?php

class Solution {

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b) {
        $sb = "";
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        $carry = 0;

        while ($i >= 0 || $j >= 0 || $carry > 0) {
            $sum = $carry;
            if ($i >= 0) $sum += ord($a[$i--]) - ord('0');
            if ($j >= 0) $sum += ord($b[$j--]) - ord('0');
            $sb .= chr($sum % 2 + ord('0'));
            $carry = intval($sum / 2);
        }
        return strrev($sb);
    }
}
