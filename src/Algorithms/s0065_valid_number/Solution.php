class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
        $isE = false;
        $isPoint = false;
        $lastChar = -1;
        $llastChar = -1;
        if(strlen($s)==1 && !(ord($s[0])>=48 && ord($s[0])<=57)){
            return false;
        }
        $s=trim($s);
        for($i=0;$i<strlen($s);$i++){
            $t = ord($s[$i]);
            if($i==0 && $t==101){
                return false;
            }
            if(!(($t>=48 && $t<=57) || $t==101 || $t== 43 || $t==45 || $t==46)){
                return false;
            }
            if($t == 101){
                if($isE){
                    return false;
                }
                if($i == strlen($s)-1){
                    return false;
                }
                if($lastChar==43 || $lastChar==45 || $lastChar==46){
                    if($llastChar == -1){
                        return false;
                    }
                }
                $isE = true;
            }
            if($t == 46 ){
                if($isE){
                    return false;
                }
                if($i == strlen($s)-1 && !($lastChar>=48 && $lastChar<=57)){
                    return false;
                }
                if($isPoint){
                    return false;
                }
                $isPoint  = true;
            }
            if(($t==43 || $t==45)&& $i!=0 && ($lastChar!=101 ||($lastChar==101 && $i == strlen($s)-1))){
                    return false;
            }
            $llastChar = $lastChar;
            $lastChar = $t;
        }
        return true;
    }
}
