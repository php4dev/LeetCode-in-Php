class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
        $len = strlen($s);
        $end;
        $a = array_fill(0, $len, false);
        $a[0] = true;
        for ($i = 0; $i < $len; $i++) {
            if (!$a[$i]) continue;
            foreach ($wordDict as $word) {
                $end = $i + strlen($word);
                if ($end <= $len && substr($s, $i, $end - $i) == $word) {
                    if ($end == $len) return true;
                    $a[$end] = true;
                }
            }
        }
        return false;
    }
}
