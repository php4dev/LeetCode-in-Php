<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $low = 0;
        $high = count($nums) - 1;
        while ($low <= $high) {
            $m = intval(($low + $high) / 2);
            if ($nums[$m] == $target) {
                return $m;
            }
            if ($nums[$low] <= $nums[$m]) {
                if ($target >= $nums[$low] && $target <= $nums[$m]) {
                    $high = $m - 1;
                } else {
                    $low = $m + 1;
                }
            } else {
                if ($target >= $nums[$m] && $target <= $nums[$high]) {
                    $low = $m + 1;
                } else {
                    $high = $m - 1;
                }
            }
        }
        return -1;
    }
}
