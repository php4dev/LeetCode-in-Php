<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $map = [];
        for ($i = 0; $i < count($strs); $i++) {
            $s = $strs[$i];
            $temp = str_split($s);
            sort($temp);
            $sorted = implode($temp);
            if ($map[$sorted] == null) {
                $map[$sorted] = [];
            }
            array_push($map[$sorted], $strs[$i]);
        }
        return array_values($map);
    }
}
