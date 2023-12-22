class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $start = 0;
        for($i = 0; $i < count($nums); $i++){
            if($nums[$i] != $val){
                $nums[$start] = $nums[$i];
                $start++;
            }
        }

        return $start;
    }
}
