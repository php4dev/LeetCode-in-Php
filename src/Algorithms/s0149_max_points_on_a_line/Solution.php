<?php

/**
 * Definition for a point.
 * class Point(
 *     public $x = 0;
 *     public $y = 0;
 *     function __construct(int $x = 0, int $y = 0) {
 *         $this->x = $x;
 *         $this->y = $y;
 *     }
 * )
 */
class Solution {

    /**
     * @param Point[] $points
     * @return Integer
     */
    function maxPoints($points) {
        $max = 0;
        $duplicated = 0;
        $isMaxChanged = false;
        if ($points == null || count($points) == 0) {
            return 0;
        } else if (count($points) == 1) {
            return 1;
        } else if (count($points) == 2) {
            return 2;
        } else {
            for ($i = 0; $i < count($points); $i++) {
                //key is a string = y + "/" + x to prevent from division/float/double/BigDecimal
                //value is amount of points on the same line -1
                $amount = [];
                //j=i+1 to prevent from backwarding loop
                for ($j = $i + 1; $j < count($points); $j++) {
                    $y = $points[$j]->y - $points[$i]->y;
                    $x = $points[$j]->x - $points[$i]->x;

                    if ($x == 0 && $y == 0) {
                        $duplicated++;
                        if ($isMaxChanged == true) {
                            $max++;
                        } else if ($max < $duplicated) {
                            $max = $duplicated;
                        }

                    } else {
                        $gcd = self::getGCD($y, $x);
                        if ($gcd != 0) {
                            $y = intval($y / $gcd);
                            $x = intval($x / $gcd);
                            $k = $y . "/" . $x;
                            if (array_key_exists($k, $amount)) {
                                $n = $amount[$k];
                                $amount[$k] = $n + 1;
                                if ($max < $n + 1 + $duplicated) {
                                    $max = $n + 1 + $duplicated;
                                    $isMaxChanged = true;
                                }
                            } else {
                                $amount[$k] = 1;
                                if ($max < 1 + $duplicated) {
                                    $max = 1 + $duplicated;
                                    $isMaxChanged = true;
                                }
                            }
                        }
                    }
                }

                $duplicated = 0;
                $isMaxChanged = false;

            }
            return $max + 1;
        }
    }

    //horizontal lines make x=0 & y=1
    //vertical lines make x=1 & y=0
    //same position points should not invoke this function whick make x=0 & y=0
    //other points return the gcd
    function getGCD($y, $x) {
        if ($x == 0) {
            if ($y == 0) {
                return 0;//same point
            } else {
                return $y;//horizontal lines
            }
        } else {
            //normal case and the vertical lines
            if ($y % $x != 0) {
                return self::getGCD($x, $y % $x);
            } else {
                return $x;
            }
        }
    }
}
