class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        sort($nums);
        return $nums[intval(count($nums)/2)];
    }
}
