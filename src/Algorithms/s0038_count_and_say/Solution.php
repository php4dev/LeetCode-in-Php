<?php

class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n) {
        $s = "1";
        while ($n > 1) {
            $sub = "";
            $i = 0;
            $num = 0;
            $ch = '';
            $pre = ' ';
            while ($i <= strlen($s)) {
                $ch = ($i == strlen($s) ? ' ' : $s[$i]);
                if (($pre != ' ' && $ch != $pre) || $ch == ' ') {
                    $sub .= ($num == 0 ? 1 : $num) . "" . $pre;
                    $pre = $ch;
                    $num = 1;
                } else {
                    $num++;
                    $pre = $ch;
                }
                $i++;
            }
            $s = $sub;
            $n--;
        }
        return $s;
    }
}
