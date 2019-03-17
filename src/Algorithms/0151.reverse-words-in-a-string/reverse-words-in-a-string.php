class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $words = explode(" ", $s);
        $sb = "";
        
        for ($i = count($words)-1; $i>= 0; $i--){
            if(strlen(trim($words[$i])) != 0){
                $sb .= trim($words[$i]);
                $sb .= " ";
            }
        }
        return trim($sb);
    }
}
