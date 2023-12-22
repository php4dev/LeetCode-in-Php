class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        $n1 = strlen($word1); $n2 = strlen($word2);
        if ($n2 > $n1)
            return self::minDistance($word2, $word1);
        $dp = array_fill(0, $n2+1, 0);
        for ($j = 0; $j <= $n2; $j++)
            $dp[$j] = $j;
        for ($i = 1; $i <= $n1; $i++) {
            $pre = $dp[0];
            $dp[0] = $i;
            for ($j = 1; $j <= $n2; $j++) {
                $tmp = $dp[$j];
                $dp[$j] = $word1[$i-1] != $word2[$j-1] 
                    ? 1 + min($pre, min($dp[$j], $dp[$j-1]))
                    : $pre;
                $pre = $tmp;
            }
        }
        return $dp[$n2];
    }
}
