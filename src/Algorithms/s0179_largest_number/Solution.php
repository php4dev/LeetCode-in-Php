<?php

class Solution {

    function cmp($str1, $str2) {
        $s1 = $str1 . $str2;
        $s2 = $str2 . $str1;
        return strcmp($s2, $s1);
    }

    /**
     * @param Integer[] $nums
     * @return String
     */
    function largestNumber($nums) {
        $strs = array_fill(0, count($nums), "");
        for ($i = 0; $i < count($nums); $i++) {
            $strs[$i] = "" . $nums[$i];
        }

        usort($strs, 'self::cmp');

        if ($strs[0] == "0") {
            return "0";
        }

        $sb = "";
        foreach ($strs as $str) {
            $sb .= $str;
        }

        return $sb;
    }
}
