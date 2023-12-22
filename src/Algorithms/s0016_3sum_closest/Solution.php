class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);
        $min = 2147483647;
        $res = 0;
        for($i=2;$i<count($nums);$i++){
            $l=0;$r=$i-1;

            while($l<$r){
                $sum = $nums[$l]+$nums[$r]+$nums[$i];
                if($sum == $target){
                    return $target;
                }
                $diff= abs($target-$sum);
                if($diff<$min){
                    $min = $diff;
                    $res = $sum;
                }
                if($sum<$target){
                    $l++;
                }
                else{
                    $r--;
                }
            }
        }
        return $res;
    }
}