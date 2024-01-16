<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $length = 0;
        $first = false;
        for ($i = strlen($s) - 1; $i >= 0; $i--) {
            if ($s[$i] == ' ' && $first) {
                return $length;
            } else if ($s[$i] != ' ') {
                $first = true;
                $length++;
            }
        }
        return $length;
    }
}
