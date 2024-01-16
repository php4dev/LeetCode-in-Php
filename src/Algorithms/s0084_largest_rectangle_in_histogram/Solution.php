<?php

class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
        $max = 0;
        $i = 0;
        $stack = [];
        while ($i < count($heights) || count($stack) != 0)
            if ($i < count($heights) && (count($stack) == 0 || $heights[$i] >= $heights[end($stack)])) array_push($stack, $i++);
            else $max = max($max, $heights[array_pop($stack)] * (count($stack) == 0 ? $i : $i - end($stack) - 1));
        return $max;
    }
}
