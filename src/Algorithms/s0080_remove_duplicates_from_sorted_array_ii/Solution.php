class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $j = 0; $c = 0;
        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] == $nums[$j]) {
                $c++;
            }
            if ($nums[$i] == $nums[$j] && $c == 2) {
                $c--;
                continue;
            } else if ($nums[$i] != $nums[$j]) {
                $c = 0;
            }
            $j++;
            $tmp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $tmp;
        }
        return $j+1;
    }
}
