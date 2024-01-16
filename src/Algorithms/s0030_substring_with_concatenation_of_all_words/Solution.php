<?php

class Solution {

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words) {
        $sol = [];
        if (count($words) == 0 || strlen($words[0]) == 0) return $sol;
        $wordLen = strlen($words[0]);
        $listLen = count($words);
        $strLen = strlen($s);
        $maxIdx = $strLen - $wordLen * $listLen;
        if ($maxIdx < 0) return $sol;
        $map = [];
        foreach ($words as $ss)
            $map[$ss] = ($map[$ss] == null ? 0 : $map[$ss]) + 1;
        $temp = [];
        for ($i = 0; $i < $wordLen; $i++) {
            for ($j = $i; $j <= $maxIdx; $j += $wordLen) {
                for ($k = $listLen - 1; $k >= 0; $k--) {
                    $str = substr($s, $k * $wordLen + $j, $wordLen);
                    $num = ($temp[$str] == null ? 0 : $temp[$str]) + 1;
                    if ($num > ($map[$str] == null ? 0 : $map[$str])) {
                        $j += $k * $wordLen;
                        break;
                    } else if ($k == 0) {
                        $sol[] = $j;
                    } else {
                        $temp[$str] = $num;
                    }
                }
                $temp = [];
            }
        }
        return $sol;
    }
}
