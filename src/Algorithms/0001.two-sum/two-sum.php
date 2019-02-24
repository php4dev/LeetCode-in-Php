class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            $map[$nums[$i]] = $i;
        }
        for ($i = 0; $i < count($nums); $i++) {
            $complement = $target - $nums[$i];
            if (array_key_exists($complement, $map) && $map[$complement] != $i) {
                return [$i, $map[$complement] ];
            }
        }
        throw new IllegalArgumentException("No two sum solution");      
    }
}
