<?php

/**
 * Definition for an interval.
 * class Interval {
 *     public $start = 0;
 *     public $end = 0;
 *     function __construct(int $start = 0, int $end = 0) {
 *         $this->start = $start;
 *         $this->end = $end;
 *     }
 * }
 */
class Solution {

    /**
     * @param Interval[] $intervals
     * @param Interval $newInterval
     * @return Interval[]
     */
    function insert($intervals, $newInterval) {
        $res = [];

        $s = $newInterval->start;
        $e = $newInterval->end;

        foreach ($intervals as $i) {
            if ($i->start > $e) {
                array_push($res, new Interval($s, $e));
                $s = $i->start;
                $e = $i->end;
            }

            if ($s <= $i->end) {
                $s = min($s, $i->start);
                $e = max($e, $i->end);
            } else {
                array_push($res, $i);
            }
        }

        array_push($res, new Interval($s, $e));
        return $res;
    }
}
