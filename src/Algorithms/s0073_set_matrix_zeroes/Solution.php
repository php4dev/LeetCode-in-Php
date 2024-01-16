<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        if (count($matrix) == 0 || count($matrix[0]) == 0) return;
        // check whether the first row has zero;
        $firstRowZero = false;
        for ($j = 0; $j < count($matrix[0]); $j++)
            if ($matrix[0][$j] == 0) {
                $firstRowZero = true;
                break;
            }
        // Set all rows that have zero to zeros, and mark the zero column in the first row
        for ($i = 1; $i < count($matrix); $i++) {
            $rowZero = false;
            for ($j = 0; $j < count($matrix[0]); $j++) {
                if ($matrix[$i][$j] == 0) {
                    $rowZero = true;
                    $matrix[0][$j] = 0;
                }
            }
            if ($rowZero) $matrix[$i] = array_fill(0, count($matrix[$i]), 0);
        }
        // Set all the zero columns to zeros
        for ($j = 0; $j < count($matrix[0]); $j++)
            if ($matrix[0][$j] == 0)
                for ($i = 1; $i < count($matrix); $i++)
                    $matrix[$i][$j] = 0;
        // deal with the first row
        if ($firstRowZero) $matrix[0] = array_fill(0, count($matrix[0]), 0);
    }
}
