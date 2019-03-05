class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Boolean
     */
    function search($nums, $target) {
        $n = count($nums);
        $m = intval($n/2);
        for($i=0; $i<$m; $i++)
          if($nums[$i] == $target) return true;
        for($i=$m; $i<$n; $i++)
          if($nums[$i] == $target) return true;
        return false;
    }
}
