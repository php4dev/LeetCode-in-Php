<?php

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $list = [];
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $c = $board[$i][$j];
                if ($c == '.') continue;
                if (in_array($c, $list)) return false;
                $list[] = $c;
            }
            $list = [];
        }
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                $c = $board[$j][$i];
                if ($c == '.') continue;
                if (in_array($c, $list)) return false;
                $list[] = $c;
            }
            $list = [];
        }
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                for ($x = 3 * $i; $x < 3 + 3 * $i; $x++) {
                    for ($y = 3 * $j; $y < 3 + 3 * $j; $y++) {
                        $c = $board[$x][$y];
                        if ($c == '.') continue;
                        if (in_array($c, $list)) return false;
                        $list[] = $c;
                    }
                }
                $list = [];
            }
        }
        return true;
    }
}
