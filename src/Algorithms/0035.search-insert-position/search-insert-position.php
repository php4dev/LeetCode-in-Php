class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        for($i = 0; $i < count($nums) && $nums[$i] <= $target; $i++) {
            if ($nums[$i] == $target) {
                return $i;
            }
        }
        return $i;
    }
}
