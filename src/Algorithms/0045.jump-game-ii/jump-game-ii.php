class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function jump($nums) {
        $step = 0;
        $curMax = 0;
        $index = 0;

        while ($curMax < count($nums) - 1) {
            $step++;
            $tmp = $curMax;
            while ($index <= $tmp) {
                $curMax = max($curMax, $index + $nums[$index]);
                $index++;
            }
        }

        return $step;
    }
}
