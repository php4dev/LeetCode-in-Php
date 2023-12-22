class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $list = [];
        self::backtrack($list, [], $n, 1,$k);
        return $list;
    }

    function backtrack(&$list, $tempList, $n, $start,$k)   {
        if(count($tempList) <= $k) {
            if(count($tempList) == $k)  array_push($list, $tempList);
            for($i = $start; $i <= $n; $i++) {
                array_push($tempList, $i);
                self::backtrack($list, $tempList, $n, $i + 1, $k);
                array_pop($tempList);
            }
        }
    }
}
