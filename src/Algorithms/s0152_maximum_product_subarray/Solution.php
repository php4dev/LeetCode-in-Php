class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        if ($nums == null || count($nums) == 0) {
            return 0;
        }
        $max = $nums[0];
        $min = $nums[0];
        $result = $nums[0];
        for ($i = 1; $i < count($nums); $i++) {
            $temp = $max;
            $max = max(max($max * $nums[$i], $min * $nums[$i]), $nums[$i]);
            $min = min(min($temp * $nums[$i], $min * $nums[$i]), $nums[$i]);
            if ($max > $result) {
                $result = $max;
            }
        }
        return $result;
    }
}
