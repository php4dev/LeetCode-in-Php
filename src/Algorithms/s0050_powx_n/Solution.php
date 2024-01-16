<?php

class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if ($x == 1) {
            return $x;
        }
        if ($x == -1) {
            return $n % 2 == 0 ? 1 : -1;
        }
        if ($n == 0) {
            return 1;
        }
        if ($n < 0) {
            $x = 1 / $x;
            $n = abs($n);
        }
        return self::helper($x, $n);
    }

    function helper($x, $n) {
        if ($x == 0) {
            return 0;
        }
        if ($n == 1) {
            return $x;
        }
        if ($n == 0) {
            return 1;
        }

        $output = self::helper($x, $n / 2);

        if ($n % 2 == 0) {
            return $output * $output;
        } else {
            return $output * $output * $x;
        }
    }
}
