<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target) {
        $ind = [];
        for ($i = 0; $i < count($nums); ++$i) {
            $complement = $target - $nums[$i];
            if (array_key_exists($complement, $ind)) {
                return [$ind[$complement], $i];
            }
            $ind[$nums[$i]] = $i;
        }
        return [-1, -1];
    }
}
