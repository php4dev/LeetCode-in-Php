class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($cand, $target) {
        sort($cand);
        $res = [];
        $path = [];
        self::dfs_com($cand, 0, $target, $path, $res);
        return $res;
    }
    function dfs_com($cand, $cur, $target, $path, &$res) {
        if ($target == 0) {
            array_push($res, $path);
            return;
        }
        if ($target < 0) return;
        for ($i = $cur; $i < count($cand); $i++){
            if ($i > $cur && $cand[$i] == $cand[$i-1]) continue;
            array_push($path, $cand[$i]);
            self::dfs_com($cand, $i+1, $target - $cand[$i], $path, $res);
            array_pop($path);
        }
    }
}
