class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3) {
        $l1 = strlen($s1); $l2 = strlen($s2); $l3 = strlen($s3);
        if ($l1 + $l2 != $l3) return false;
        $dp = array_fill(0, $l1 + 1, array_fill(0, $l2 + 1, false));
        $dp[0][0] = true;
        for ($i = 1; $i <= $l1; $i++) {
            if ($s1[$i - 1] == $s3[$i - 1]) $dp[$i][0] = true;
            else break;
        }

        for ($j = 1; $j <= $l2; $j++) {
            if ($s2[$j - 1] == $s3[$j - 1]) $dp[0][$j] = true;
            else break;
        }
        for ($i = 1; $i <= $l1; $i++) {
            for ($j = 1; $j <= $l2; $j++) {
                    $dp[$i][$j] = ($dp[$i - 1][$j] && $s1[$i - 1] == $s3[$i + $j - 1]) 
					|| ($dp[$i][$j - 1] && $s2[$j - 1] == $s3[$i + $j - 1]);
            }
        }
        return $dp[$l1][$l2];   
    }
}
