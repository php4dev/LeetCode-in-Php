<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $carry = 1;
        for ($i = count($digits) - 1; $i >= 0; $i--) {
            $temp = ($digits[$i] + $carry) % 10;
            $carry = intval(($digits[$i] + $carry) / 10);
            $digits[$i] = $temp;
        }
        if ($carry == 0) return $digits;
        else {
            $res = array_fill(0, count($digits) + 1, 0);
            $res[0] = $carry;
            for ($i = 0; $i < count($digits); $i++) {
                $res[$i + 1] = $digits[$i];
            }
            return $res;
        }
    }
}
