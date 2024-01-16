<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        if ($nums == null || count($nums) == 0) {
            return 0;
        }

        $map = [];
        $result = 1;

        for ($i = 0; $i < count($nums); $i++) {
            $num = $nums[$i];
            if (array_key_exists($num, $map)) {
                continue;
            }

            $left = array_key_exists($num - 1, $map) ? $map[$num - 1] : 0;
            $right = array_key_exists($num + 1, $map) ? $map[$num + 1] : 0;
            $length = $left + $right + 1;
            $result = max($result, $length);

            $map[$num] = $length;
            $map[$num - $left] = $length;
            $map[$num + $right] = $length;
        }

        return $result;
    }
}
