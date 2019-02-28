class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestValidParentheses($s) {
        $map = [];
        $map['('] = ')';
        $map['['] = ']';
        $map['{'] = '}';
        $len = strlen($s);
        $dp = array_fill(0, $len + 1, 0);
        $dp[0] = 0;
        $res = 0;
        for($i = 1; $i <= $len; $i++) {
            $c = $s[$i - 1];
            if($c != '(' && $c != '[' && $c != '{') {
                if($dp[$i - 1] > 0 && $i - 2 - $dp[$i - 1] >= 0 &&
                   ($map[$s[$i - 2 - $dp[$i - 1]]] == null ? '?' : $map[$s[$i - 2 - $dp[$i - 1]]]) == $c) 
                        $dp[$i] = $dp[$i - 1] + $dp[$i - 2 - $dp[$i - 1]] + 2;
                else if($i > 1 && ($map[$s[$i - 2]] == null ? '?' : $map[$s[$i - 2]]) == $c) {
                    $dp[$i] = $dp[$i - 2] + 2;
                }
            }
            $res = max($res, $dp[$i]);
        }
        return $res;
    }
}
