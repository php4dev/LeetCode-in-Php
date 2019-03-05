class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        if (count($board) == 0) return false;
        $n = count($board); $m = count($board[0]);
        if (strlen($word) > $m*$n) return false;
        $visited = array_fill(0, $n, array_fill(0, $m, false));
        for ($i = 0; $i < $n; $i++) for ($j = 0; $j < $m; $j++) 
            if (self::help($i, $j, 0, $board, $word, $visited)) return true;
        return false;
    }
    
    function help($i, $j, $k, $board, $word, $visited){
        if ($k == strlen($word)) return true;
        if ($i >= count($board) || $i < 0 || $j >= count($board[0]) || $j < 0)
            return false;
        if ($visited[$i][$j] || $board[$i][$j] != $word[$k]) return false;
        $visited[$i][$j] = true;
        $b = self::help($i+1, $j, $k+1, $board, $word, $visited) || 
                    self::help($i-1, $j, $k+1, $board, $word, $visited) || 
                    self::help($i, $j-1, $k+1, $board, $word, $visited) ||
                    self::help($i, $j+1, $k+1, $board, $word, $visited);
        $visited[$i][$j] = false;
        return $b;
    }
}
