class Solution {

    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        $res = [];
        self::helper($s,0,$res,[],array_fill(0, strlen($s), array_fill(0, strlen($s), false)));
        return $res;        
    }
    
    function helper($s, $cur, &$res, $temp, &$dp) {
        if($cur == strlen($s)){
            array_push($res, $temp);
            return;
        }
        
        for($i=$cur;$i<strlen($s);$i++){
            if(self::isPlaindrome($cur,$i,$dp,$s)){
                $dp[$cur][$i] = true;
                array_push($temp, substr($s, $cur,$i+1-$cur));
                self::helper($s,$i+1,$res,$temp,$dp);
                array_pop($temp);
            }
        }
    }
    
    function isPlaindrome($i,$j, $dp, $s){
        if($s[$i] == $s[$j]){
            if($i == $j || $j == $i+1 || $dp[$i+1][$j-1]) return true;
        }
        return false;
    }
}
