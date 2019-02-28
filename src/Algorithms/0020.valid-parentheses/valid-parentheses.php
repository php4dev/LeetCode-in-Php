class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $toClose=array_fill(0, strlen($s)>>1);
        $open=0;
        try{
            for($i=0; $i<strlen($s); ++$i){
                $c=$s[$i];
                $t=0;
                switch($c){
                    case '(':
                        ++$t;
                    case '[':
                        ++$t;
                    case '{':
                        $toClose[$open++]=$t;
                        break;
                    case ')':
                        ++$t;
                    case ']':
                        ++$t;
                    case '}':
                        if($toClose[--$open]!=$t) 
                            return false;
                }
            }
            return $open==0;
        } catch(OutOfBoundsException $x){
            return false;
        }    
    }
}
