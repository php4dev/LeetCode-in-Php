class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        if($nums==null||count($nums)<=1)return 0;
        
        if(count($nums)>=2){
            if($nums[count($nums)-1]>$nums[count($nums)-2])return count($nums)-1;
        }
        
        for($i=1;$i<count($nums)-1;$i++){
            if($nums[$i]>$nums[$i-1]&&$nums[$i]>$nums[$i+1])return $i;
        }
        
        return 0;
    }
}
