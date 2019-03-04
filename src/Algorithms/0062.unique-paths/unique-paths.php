class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        $dp=array_fill(0, $m, array_fill(0, $n, 0));
        
        $dp[0] = array_fill(0, $n, 1);
        
        for($r=0;$r<$m;$r++) $dp[$r][0]=1;
        
        for($r=1;$r<$m;$r++){
            for($c=1;$c<$n;$c++){
                $dp[$r][$c]=$dp[$r-1][$c]+$dp[$r][$c-1];
            }
        }
        return $dp[$m-1][$n-1]; 
    }
}
