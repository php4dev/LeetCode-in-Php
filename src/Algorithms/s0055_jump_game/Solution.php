class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        if (count($nums) == 1) {
            return true;
        }

        $i = 0;
        $lastIndex = count($nums) - 1;
        for ($i = count($nums) - 2; $i >= 0; $i--) {
            $step = $nums[$i];
            if ($i + $step >= $lastIndex) {
                $lastIndex = $i;
            }
        }
        return $lastIndex == 0;
    }
}
