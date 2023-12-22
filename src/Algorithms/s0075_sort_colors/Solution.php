class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
		$red = 0; $white;
		$temp = 0;
		for($i = 0; $i < count($nums); $i++) {
				if($nums[$i] == 0) {            
					self::swap($nums, $red,$i);
					$red++;
				}
		}
		$white = $red;

		for($i = 0; $i < count($nums); $i++) {
			if($nums[$i] == 1) {
				self::swap($nums, $white,$i);
				$white++;
			}
		}
    }
    
    function swap(&$array, $i, $j) {
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
    } 
}
