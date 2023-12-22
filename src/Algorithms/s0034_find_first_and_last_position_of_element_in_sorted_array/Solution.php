class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $n = count($nums);
        $res = array_fill(0, 2, 0);
        $beg = 0;
        $end = $n-1;
        while ($beg <= $end) {
            $mid = $beg + intval(($end-$beg)/2);
            if ($nums[$mid] < $target) {
                $beg = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }
        $res[0] = ($beg >= $n || $nums[$beg] != $target) ? -1 : $beg;
        
        $beg = 0;
        $end = $n-1;
        while ($beg <= $end) {
            $mid = $beg + intval(($end-$beg)/2);
            if ($nums[$mid] <= $target) {
                $beg = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }
        $res[1] = ($end < 0 || $nums[$end] != $target) ? -1 : $end;
        return $res;
    }
}
