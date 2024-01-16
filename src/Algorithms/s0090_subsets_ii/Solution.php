<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsetsWithDup($nums) {
        $result = [];
        if ($nums == null || count($nums) == 0) return $result;
        sort($nums);
        array_push($result, []);
        self::dfs($nums, [], $result, 0);
        return $result;
    }

    function dfs($nums, $list, &$result, $index) {

        if ($index == count($nums)) {
            return;
        }
        for ($i = $index; $i < count($nums); $i++) {
            if ($i > $index && $nums[$i - 1] == $nums[$i]) {
                continue;
            }
            array_push($list, $nums[$i]);
            array_push($result, $list);
            self::dfs($nums, $list, $result, $i + 1);
            array_pop($list);
        }
    }
}
