<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        if (count($matrix) == 0)
            return [];
        $count = count($matrix) * count($matrix[0]);
        $res = [];
        $i = 0;
        $j = 0;
        $row = count($matrix);
        $col = count($matrix[0]);
        $start1 = 0;
        $start2 = 1;
        array_push($res, $matrix[0][0]);
        while ($count > 1) {
            while ($j < $col - 1) {
                $j++;
                array_push($res, $matrix[$i][$j]);
                $count--;
            }
            while ($i < $row - 1) {
                $i++;
                array_push($res, $matrix[$i][$j]);
                $count--;
            }
            $row--;
            $col--;
            if ($count == 1)
                break;
            while ($j > $start1) {
                $j--;
                array_push($res, $matrix[$i][$j]);
                $count--;
            }
            while ($i > $start2) {
                $i--;
                array_push($res, $matrix[$i][$j]);
                $count--;
            }
            $start1++;
            $start2++;
        }
        return $res;
    }
}
