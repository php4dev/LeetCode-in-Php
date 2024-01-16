<?php

class Solution {

    /**
     * @param Integer $numerator
     * @param Integer $denominator
     * @return String
     */
    function fractionToDecimal($num1, $deno1) {
        $neg = $num1 > 0 && $deno1 < 0 || $num1 < 0 && $deno1 > 0;
        $ret = $neg ? "-" : "";
        $num = abs($num1);
        $deno = abs($deno1);


        $p1 = intval($num / $deno);
        $remain = $num % $deno;
        if ($remain == 0) return $ret . $p1;

        $map = [];
        $sb = "";

        $start = -1;
        $end = -1;
        $map[$remain] = 0;
        echo($sb);
        while ($remain != 0) {
            $remain *= 10;
            while ($remain < $deno) {
                $sb .= '0';
                $map[$remain] = strlen($sb);
                $remain *= 10;
            }

            $res = intval($remain / $deno);
            $sb = $sb . chr($res + ord('0'));

            $remain %= $deno;
            if ($remain == 0) break;

            $len = strlen($sb);
            if (array_key_exists($remain, $map)) {
                $start = $map[$remain];
                break;
            } else {
                $map[$remain] = $len;
            }
        }

        $ret = $ret . $p1 . ".";
        if ($start == -1) {
            $ret .= $sb;
        } else {
            $ret = $ret . substr($sb, 0, $start) . "(" . substr($sb, $start) . ")";
        }

        return $ret;
    }
}
