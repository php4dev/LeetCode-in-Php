class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function minCut($s) {
        $n = strlen($s);
        $dp = array_fill(0, $n, array_fill(0, $n, false));
        $cut = array_fill(0, $n, $n - 1);
        
        for($j = 0; $j < $n; $j++) {
            for($i = 0; $i <= $j; $i++) {
                if($s[$i] == $s[$j] && ($j - $i <= 1 || $dp[$i + 1][$j - 1])) {
                    $dp[$i][$j] = true;
                    if($i == 0)
                        $cut[$j] = 0; //no cut needed
                    else
                        $cut[$j] = min($cut[$j], $cut[$i - 1] + 1);
                }
            }
        }
        
        return $cut[$n - 1];
    }
}
