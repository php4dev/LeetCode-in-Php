class Solution {

    public function __construct() {
        $this->sol = [];
        $this->nums = null;
    }

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        sort($candidates);
        $this->nums = $candidates;
        $temp = [];
        self::search($target, $temp, 0);
        return $this->sol;
    }
    
    function search($target, $list, $start){
        if ($target == 0) {
			array_push($this->sol, $list);
			return;
		}
        for ($i = $start; $i < count($this->nums); $i++){
            if ($this->nums[$i] > $target) break;
            else {
                array_push($list, $this->nums[$i]);
                self::search($target - $this->nums[$i], $list, $i);
                array_pop($list);
            }
        }
    }
}
