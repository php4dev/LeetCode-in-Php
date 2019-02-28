class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        if(count($nums) == 0) return;
        for($i = count($nums) - 2; $i >= 0; $i--){
            if($nums[$i] < $nums[$i + 1]){
                $j = $i + 1;
                while($j < count($nums) && $nums[$j] > $nums[$i]) $j++;
                self::swap($nums, $i, $j - 1);
                self::reverse($nums, $i + 1, count($nums) - 1);
                return;
            }
        }
        self::reverse($nums, 0, count($nums) - 1);
    }
    function reverse(&$nums, $i, $j){
        while($i < $j) self::swap($nums, $i++, $j--);
    }
    function swap(&$nums, $a, $b){
        $temp = $nums[$a];
        $nums[$a] = $nums[$b];
        $nums[$b] = $temp;
    }
}
