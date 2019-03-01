class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        if(count($nums) == 0) return 1;
        for($i =  0;$i < count($nums);$i++) {
            while(($nums[$i] != $i + 1) && $nums[$i] >= 1 && $nums[$i] <= count($nums) && $nums[$nums[$i] - 1] != $nums[$i]) {
                $tmp = $nums[$i] - 1;
                $nums[$i] = $nums[$tmp];
                $nums[$tmp] = $tmp + 1;                    
            }
        }
        for($i = 0;$i < count($nums);$i++) {
            if($nums[$i] != $i + 1) return $i + 1;
        }
        return count($nums) + 1;
    }
}
