<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $res = [];
        if ($nums == null || count($nums) == 0) return $res;
        $currentX = [];
        $used = array_fill(0, count($nums), false);
        for ($j = 0; $j < count($used); $j++) {
            $used[$j] = false;
        }
        self::bt($currentX, $nums, $used, $res);
        return $res;
    }

    function bt($currentX, &$nums, $used, &$res) {
        if (count($currentX) == count($nums)) {
            array_push($res, $currentX);
            return;
        }

        for ($i = 0; $i < count($nums); $i++) {

            if ($used[$i] == true) continue;
            array_push($currentX, $nums[$i]);
            $used[$i] = true;

            self::bt($currentX, $nums, $used, $res);

            array_pop($currentX);
            $used[$i] = false;
        }
    }
}
