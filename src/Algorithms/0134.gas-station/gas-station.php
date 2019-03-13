class Solution {

    /**
     * @param Integer[] $gas
     * @param Integer[] $cost
     * @return Integer
     */
    function canCompleteCircuit($gas, $cost) {
        $sum = 0;
        $min = 2147483647;
        $minIndex = 0;
        for($i=0; $i<count($gas); $i++){
            $sum += $gas[$i]-$cost[$i];
            if($sum<$min){
                $min = $sum;
                $minIndex = $i;
            }
        }
        if($sum<0) return -1;
        return $minIndex==count($gas)-1 ?  0 : $minIndex + 1;
    }
}
