<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permuteUnique($nums) {
        return self::helper($nums, 0);
    }

    function helper($nums, $index) {
        $result = [];
        if ($index == count($nums) - 1) {
            $temp = [];
            array_push($temp, $nums[$index]);
            array_push($result, $temp);
            return $result;
        }
        foreach (self::helper($nums, $index + 1) as $temp) {
            for ($i = 0; $i <= count($temp); $i++) {
                if ($i == 0 || $temp[$i - 1] != $nums[$index]) {
                    $temp2 = $temp;
                    array_splice($temp2, $i, 0, $nums[$index]);
                    array_push($result, $temp2);
                } else {
                    break;
                }
            }
        }
        return $result;
    }
}
