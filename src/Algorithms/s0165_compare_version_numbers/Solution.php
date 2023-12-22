class Solution {

    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion($v1, $v2) {
        $i1 = 0; $i2 = 0; $n1 = 0; $n2 = 0;
        while ($i1 < strlen($v1) || $i2 < strlen($v2)) {
            while ($i1 < strlen($v1) && $v1[$i1] != '.') {
                $n1 = $n1 * 10 + ord($v1[$i1++]) - ord('0');
            }
            while ($i2 < strlen($v2) && $v2[$i2] != '.') {
                $n2 = $n2 * 10 + ord($v2[$i2++]) - ord('0');
            }
            if ($n1 > $n2) return 1;
            if ($n1 < $n2) return -1;
            $n1 = $n2 = 0;
            $i1++; $i2++;
        }
        return 0;
    }
}
