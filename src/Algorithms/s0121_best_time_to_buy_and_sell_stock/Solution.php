class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $max_profit=0;
        $cur_profit=0;
        $cur_min=0;
        $cur_max= 0;
        for($i = 0; $i < count($prices); $i++){
            if($i==0) {
                $cur_min = $prices[$i];
                $cur_max = $prices[$i];
                continue;
            }
            if ($prices[$i]< $cur_min){
                $cur_min = $prices[$i];
                $cur_max = $prices[$i];              
            }
            else if($prices[$i] > $cur_max){
                $cur_max = $prices[$i];
            }
            $cur_profit = $cur_max - $cur_min;
            if($cur_profit > $max_profit) $max_profit = $cur_profit;
        }
        return $max_profit;
    }
}
