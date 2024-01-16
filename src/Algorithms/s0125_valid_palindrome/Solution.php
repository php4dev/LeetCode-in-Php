<?php

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        if ($s == null || strlen($s) < 2) return true;

        for ($i = 0, $j = strlen($s) - 1; $i < $j;) {
            if (self::normalizeChar($s[$i]) == ' ') $i++;
            else if (self::normalizeChar($s[$j]) == ' ') $j--;
            else if (self::normalizeChar($s[$i++]) != self::normalizeChar($s[$j--]))
                return false;
        }

        return true;
    }

    function normalizeChar($c) {
        if (ord($c) > 96 && ord($c) < 123 || ord($c) > 47 && ord($c) < 58) return $c;
        if (ord($c) > 64 && ord($c) < 91) return chr(ord($c) + 32);
        return ' ';
    }
}
