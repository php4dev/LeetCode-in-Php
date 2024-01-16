<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = $i; $j < count($matrix); $j++) {
                if ($i == $j) continue;
                $temp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $temp;
            }
        }
        for ($i = 0; $i < count($matrix); $i++) {
            $start = 0;
            $end = count($matrix[$i]) - 1;
            while ($start < $end) {
                $temp = $matrix[$i][$start];
                $matrix[$i][$start] = $matrix[$i][$end];
                $matrix[$i][$end] = $temp;
                $start++;
                $end--;
            }
        }
    }
}
