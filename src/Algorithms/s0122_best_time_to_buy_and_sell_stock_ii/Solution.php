<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $res = 0;

        for ($i = 0; $i < count($prices) - 1; $i++) {
            if ($prices[$i] < $prices[$i + 1]) $res += ($prices[$i + 1] - $prices[$i]);
        }
        return $res;
    }
}
