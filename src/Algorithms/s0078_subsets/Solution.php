class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums) {
        $count = intval(pow(2,count($nums)));
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $list = [];
            $temp = $i;
            $index = 0;
            while ($temp != 0) {
                if (($temp & 1) == 1) {
                    array_push($list, $nums[$index]);
                }
                $index++;
                $temp = $temp >> 1;
            }
            array_push($result, $list);
        }
        return $result;
    }
}
