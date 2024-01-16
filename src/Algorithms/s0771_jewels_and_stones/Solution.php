<?php

class Solution {

    /**
     * @param String $jewels
     * @param String $stones
     * @return Integer
     */
    function numJewelsInStones($jewels, $stones) {
        $jewelsArr = str_split($jewels);
        foreach ($jewelsArr as $jewel) {
            $b += substr_count($stones, $jewel);
        }
        return $b;
    }
}
