class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        for($i=1;$i<count($nums);$i++){
            if($nums[$i]<$nums[$i-1])
                return $nums[$i];
        }
        return $nums[0];
    }
}
