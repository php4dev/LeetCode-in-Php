class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $res = [];
        sort($nums);
        $i = 0; $j = 0; $n = count($nums); $k = $n - 1;
        if ($k < 2 || $nums[$k] < 0) {
            return $res;
        }
        while ($i < $n - 2) {
            if ($nums[$i] > 0) {
                break;
            }
            $target = -$nums[$i];
            $j = $i + 1;
            $k = $n - 1;
            while ($j < $k) {
                if ($nums[$k] < 0) {
                    break;
                }
                if ($nums[$j] + $nums[$k] == $target) {
                    $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                    while($j < $k && $nums[$j] == $nums[++$j]);
                    while($j < $k && $nums[$k] == $nums[--$k]);
                } else if ($nums[$j] + $nums[$k] > $target) {
                    $k--;
                } else {
                    $j++;
                }
            }
            while ($i < $n - 2 && $nums[$i] == $nums[++$i]);
        }
        return $res;
    }
}
