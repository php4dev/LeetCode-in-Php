class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $r=count($nums)-1;
        $l=0;
        if($r<0) return -1;
        $first=$nums[0];
        if($first==$nums[$r]){//move util the start is not equal to the end any more;
            while($l<$r && $nums[$l]==$first) $l++;
            while($l<$r && $nums[$r]==$first) $r--;
        }
        if($nums[$l]<=$nums[$r]){ //deal with the ascending condition.
            return $nums[$l]<$first?$nums[$l]:$first;
        }
        while($l<$r-1){//now we are bold to handle it as there must be a steep and the minimum is the right one. 
            $m=intval($l+($r-$l)/2);
            if($nums[$m]>=$nums[$l]) $l=$m;
            else $r=$m;
        }
        return $nums[$r];
    }
}
