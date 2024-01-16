<?php

class Solution {

    /**
     * @param String[] $words
     * @param Integer $maxWidth
     * @return String[]
     */
    function fullJustify($words, $maxWidth) {
        $n = count($words);
        $beg = 0;
        $res = [];
        while ($beg < $n) {
            $end = $beg;
            $used = 0;
            while ($end < $n && strlen($words[$end]) + $used <= $maxWidth) {
                $used += strlen($words[$end++]) + 1;
            }
            $sb = "";
            if ($end == $n) {
                for ($i = $beg; $i < $end; ++$i) {
                    $sb .= $words[$i];
                    if ($i < $end - 1) $sb .= ' ';
                }
            } else {
                $c = $maxWidth - $used + ($end - $beg);
                $slots = $end - $beg - 1;
                for ($i = 0; $i < $end - $beg - 1; ++$i) {
                    $sb .= $words[$i + $beg];
                    for ($j = 0; $j < intval($c / $slots); ++$j) {
                        $sb .= ' ';
                    }
                    if ($i < $c % $slots) $sb .= ' ';
                }
                $sb .= $words[$end - 1];
            }
            $c = $maxWidth - strlen($sb);
            while ($c-- > 0) $sb .= ' ';
            array_push($res, $sb);
            $beg = $end;
        }
        return $res;
    }
}
