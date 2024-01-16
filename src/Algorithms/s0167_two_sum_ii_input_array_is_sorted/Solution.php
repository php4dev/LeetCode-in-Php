<?php

class Solution {

    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $res = array_fill(0, 2, 0);
        for ($i = 0, $j = count($numbers) - 1; $i < $j;) {
            $sum = $numbers[$i] + $numbers[$j];
            if ($sum == $target) {
                $res[0] = $i + 1;
                $res[1] = $j + 1;
                return $res;
            } else if ($sum < $target) $i++;
            else $j--;
        }
        return $res;
    }
}
