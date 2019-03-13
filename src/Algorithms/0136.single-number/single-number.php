class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        for ($i = 1; $i < count($nums); $i++) {
            $nums[0] = $nums[0] ^ $nums[$i];
        }
        return $nums[0];
    }
}
