<?php

class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function isScramble($s1, $s2) {
        if ($s1 == null && $s2 == null) return true;
        if (strlen($s1) != strlen($s2)) return false;
        return self::helper($s1, $s2, 0, 0, strlen($s1));
    }

    function helper($cs1, $cs2, $s1, $s2, $len) {
        if ($len == 0) return true;
        $same = true;
        for ($i = 0; $i < $len; $i++) {
            if ($cs1[$s1 + $i] != $cs2[$s2 + $i]) {
                $same = false;
                break;
            }
        }
        if ($same) return true;
        $letters = array_fill(0, 26, 0);
        for ($i = 0; $i < $len; $i++) {
            $letters[ord($cs1[$s1 + $i]) - ord('a')]++;
            $letters[ord($cs2[$s2 + $i]) - ord('a')]--;
        }
        foreach ($letters as $cnt) if ($cnt != 0) return false;
        for ($i = 1; $i < $len; $i++) {
            if (self::helper($cs1, $cs2, $s1, $s2, $i) && self::helper($cs1, $cs2, $s1 + $i, $s2 + $i, $len - $i)) return true;
            if (self::helper($cs1, $cs2, $s1, $s2 + $len - $i, $i) && self::helper($cs1, $cs2, $s1 + $i, $s2, $len - $i)) return true;
        }
        return false;
    }
}
