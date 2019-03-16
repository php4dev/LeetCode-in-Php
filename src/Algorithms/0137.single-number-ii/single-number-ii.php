class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        sort($nums); 
        
        $result = -1; 
        $found = false; 
        $i = 0; 
        
        while($found == false){
            $found = false;
			
            if($i == count($nums) - 1){
                $result = $nums[$i]; 
                $found = true; 
                break;
            }
			//if its next one, then we know three more of same number exist
            if($nums[$i] == $nums[$i+1]){
                $i+=3; 
                continue; 
            }
            else{
			//if not equal to the one next to it, we've found it. 
                $result = $nums[$i]; 
                $found = true; 
                break;
            }
        }
        return $result; 
    }
}
