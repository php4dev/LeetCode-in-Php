<?php

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $hold1 = -2147483647;
        $hold2 = -2147483647;
        $release1 = 0;
        $release2 = 0;
        foreach ($prices as $i) {                              // Assume we only have 0 money at first
            $release2 = max($release2, $hold2 + $i);     // The maximum if we've just sold 2nd stock so far.
            $hold2 = max($hold2, $release1 - $i);  // The maximum if we've just buy  2nd stock so far.
            $release1 = max($release1, $hold1 + $i);     // The maximum if we've just sold 1nd stock so far.
            $hold1 = max($hold1, -$i);          // The maximum if we've just buy  1st stock so far.
        }
        return $release2; ///Since release1 is initiated as 0, so release2 will always higher than release1.
    }
}
