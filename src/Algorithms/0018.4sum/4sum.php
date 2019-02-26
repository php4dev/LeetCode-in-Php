class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        $result = [];
        sort($nums);
        $sum  = 0;
        
        for($i=0;$i<count($nums);$i++){
            if($i!=0 && $nums[$i-1]==$nums[$i]) // avoid duplicates
                continue;
            
            for($j=$i+1;$j<count($nums);$j++){
                
                if($nums[$j-1]==$nums[$j] && $i!=$j-1) // // avoid duplicates
                    continue;
                
                $k = $j+1;
                $l = count($nums)-1;
                
                while($k<$l){
                    
                    $output = [];
                    if($nums[$i]+$nums[$j]+$nums[$k]+$nums[$l]==$target){
                        $output[] = $nums[$i];
                        $output[] = $nums[$j];
                        $output[] = $nums[$k];
                        $output[] = $nums[$l];
                        $result[] = $output;
                        
                        $k++;
                        while($k<$l && $nums[$k-1]==$nums[$k]) // avoid duplicates
                            $k++;
                        
                        $l--;
                        while($k<$l && $nums[$l+1]==$nums[$l])  // avoid duplicates
                            $l--;
                    }
                    else if($nums[$i]+$nums[$j]+$nums[$k]+$nums[$l]>$target){
                        $l--;
                    }
                    else 
                        $k++;
                }
            }
        }
        
        
        return $result;
    }
}
