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

    function cmp($a, $b) {
        if ($a->start == $b->start) {
            return 0;
        }
        return ($a->start < $b->start) ? -1 : 1;
    }

    /**
     * @param Interval[] $intervals
     * @return Interval[]
     */
    function merge($intervals) {
        usort($intervals, 'self::cmp');
        $mergedIntervals = [];
        
        for ($i = 0; $i < count($intervals);) {
            $interval = $intervals[$i];
            $start = $interval->start;
            $end = $interval->end;
            
            while (++$i < count($intervals) && $intervals[$i]->start <= $end) {
                if ($end < $intervals[$i]->end) {
                    $end = $intervals[$i]->end;
                }
            }
            array_push($mergedIntervals, new Interval($start, $end));
        }
        
        return $mergedIntervals;
    }
}
