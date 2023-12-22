class Solution {

    var $tot = 0;
    /**
     * @param Integer $n
     * @return Integer
     */
    function totalNQueens($n) {
        $col = array_fill(0, $n, 0);
        $cur = 0;
        return self::totalQueens($n,$cur,$col);
    }
    
    function totalQueens($n,$cur,&$col){
        if($cur == $n) $this->tot++;
        else{
            for($i = 0; $i < $n; $i++){
                $ok = true;
                $col[$cur] = $i;
                for($j = 0; $j < $cur; $j++){
                    if($col[$cur] == $col[$j] || $cur+$col[$cur] == $j + $col[$j] || $cur-$col[$cur] == $j - $col[$j]){
                        $ok = false;
                        break;
                    }
                }
                if($ok){
                    self::totalQueens($n,$cur+1,$col);
                }
            }
        }
        return $this->tot;
    }
}
