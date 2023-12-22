class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if (strlen($s)==0) return 0;
        $map = [];
        $max = 0;
        for ($i=0, $j=0; $i < strlen($s); ++$i) {
            if (array_key_exists($s[$i], $map)){
                $j = max($j, $map[$s[$i]] + 1);
            }
            $map[$s[$i]] = $i;
            $max = max($max, $i - $j + 1);
        }
        return $max;
    }
}