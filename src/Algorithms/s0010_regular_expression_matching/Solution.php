class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
        $dp = array_fill(0, strlen($s) + 1, array_fill(0, strlen($p) + 1, false));
        $dp[strlen($s)][strlen($p)] = true;

        for ($i = strlen($s); $i >= 0; $i--){
            for ($j = strlen($p) - 1; $j >= 0; $j--){
                $first_match = ($i < strlen($s) &&
                                       ($p[$j] == $s[$i] ||
                                        $p[$j] == '.'));
                if ($j + 1 < strlen($p) && $p[$j+1] == '*'){
                    $dp[$i][$j] = $dp[$i][$j+2] || $first_match && $dp[$i+1][$j];
                } else {
                    $dp[$i][$j] = $first_match && $dp[$i+1][$j+1];
                }
            }
        }
        return $dp[0][0];
    }
}