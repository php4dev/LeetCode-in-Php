class Solution {

    private $dp;
    private $visited;

    /**
     * @param Integer[][] $dungeon
     * @return Integer
     */
    function calculateMinimumHP(&$dungeon) {
        $dp = array_fill(0, count($dungeon), array_fill(0, count($dungeon[0]), 0));
        $visited = array_fill(0, count($dungeon), array_fill(0, count($dungeon[0]), false));
        $val = self::solve($dungeon, 0, 0);
        return $val >= 1 ? 1 : 1-$val;
    }
    
    function solve(&$dungeon, $i, $j) {
        if($i == count($dungeon)-1 && $j == count($dungeon[0])-1) return $dungeon[$i][$j];
        if($i == count($dungeon)) return -2147483647;
        if($j == count($dungeon[0])) return -2147483647;
        
        if($visited[$i][$j]) {
            return $dp[$i][$j];
        }
        
        $val = min($dungeon[$i][$j] + max(self::solve($dungeon, $i+1, $j), self::solve($dungeon, $i, $j+1)), $dungeon[$i][$j]);
        
        $dp[$i][$j] = $val;
        $visited[$i][$j] = true;
        
        return $val;
    }
}
