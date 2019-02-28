class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        if(strlen($needle) == 0) return 0;
        if(strlen($haystack) == 0) return -1;
        if(strlen($haystack) == 1 && strlen($needle) == 1){
            if($haystack[0] == $needle[0]){
                return 0;
            }
        }
        
        for($i = 0; $i < strlen($haystack) - strlen($needle) + 1; $i++){
            if($needle === substr($haystack, $i, strlen($needle))){
                return $i;
            }
        }
        return -1; 
    }
}
