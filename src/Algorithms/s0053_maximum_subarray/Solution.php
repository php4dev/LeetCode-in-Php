class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $sum =$nums[0];
        $n = count($nums);
        $max=$sum;
        for($i=1;$i<$n;$i++){
            $sum = $nums[$i]>$nums[$i]+$sum?$nums[$i]:$nums[$i]+$sum;
            $max = $max > $sum? $max : $sum;
        }
        return $max;
    }
}
