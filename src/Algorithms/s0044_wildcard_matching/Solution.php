<?php

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
        $dp = array_fill(0, strlen($p) + 1, array_fill(0, strlen($s) + 1, 0));
        $dp[0][0] = 1;
        for ($i = 0; $i < strlen($p); $i++) {
            if ($p[$i] == '?') {
                for ($j = 0; $j < strlen($s); $j++) {
                    if ($dp[$i][$j] == 1)
                        $dp[$i + 1][$j + 1] = 1;
                }
            } else if ($p[$i] == '*') {
                $a = 0;
                for ($j = 0; $j < count($dp[$i]); $j++) {
                    if ($dp[$i][$j] == 1) $a = 1;
                    $dp[$i + 1][$j] = $a;
                }
            } else {
                for ($j = 0; $j < strlen($s); $j++) {
                    if ($dp[$i][$j] == 1 && $p[$i] == $s[$j])
                        $dp[$i + 1][$j + 1] = 1;
                }
            }
        }
        return $dp[strlen($p)][strlen($s)] == 1;
    }
}
