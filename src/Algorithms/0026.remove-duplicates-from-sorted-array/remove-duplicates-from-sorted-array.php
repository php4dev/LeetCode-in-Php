class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        if (count($nums) < 2)
            return count($nums);

        $j = 0;
        $i = 1;

        while ($i < count($nums)) {
            if ($nums[$i] == $nums[$j]) {
                $i++;
            } else {
                $j++;
                $nums[$j] = $nums[$i];
                $i++;
            }
        }

        return $j + 1;
    }
}
