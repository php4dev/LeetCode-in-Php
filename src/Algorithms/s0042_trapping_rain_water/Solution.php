class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        if($height == null || count($height) == 0) return 0;
        
        $max = 0;
        $memo = array_fill(0, count($height), 0);
        for($i = 0; $i < count($height); $i++){
            $max = max($max, $height[$i]);
            $memo[$i] = $max;
        }
        
        $max = 0;
        for($i = count($height) - 1; $i >= 0; $i--){
            $max = max($max, $height[$i]);
            $memo[$i] = min($memo[$i], $max);
        }
        
        $volume = 0;
        for($i = 0; $i < count($height); $i++){
            $volume += $memo[$i] - $height[$i];
        }
        
        return $volume;
    }
}
