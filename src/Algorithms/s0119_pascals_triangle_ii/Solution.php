<?php

class Solution {

    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        $lvl = [];
        self::getRowHelper($lvl, 0, $rowIndex);
        return $lvl;
    }

    function getRowHelper(&$lvl, $row, $rowIndex) {
        // base case when the recursion should stop
        if ($row > $rowIndex)
            return;

        $numElem = $row + 1;
        $prev = 0;
        for ($i = 0; $i < $numElem; $i++) {
            if ($i == $numElem - 1)
                array_push($lvl, 1);
            else {
                // in-place replacement using temporary `prev`
                $curr = $lvl[$i];
                $lvl[$i] = $curr + $prev;
                $prev = $curr;  // update prev for next iteration
            }
        }
        // recurse
        self::getRowHelper($lvl, $row + 1, $rowIndex);
    }
}
