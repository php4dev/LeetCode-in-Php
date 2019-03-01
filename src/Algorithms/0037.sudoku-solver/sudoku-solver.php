class Solution {
    public function __construct() {
        $this->row = array_fill(0, 9, array_fill(0, 9, false));
        $this->col = array_fill(0, 9, array_fill(0, 9, false));
        $this->grid = array_fill(0, 9, array_fill(0, 9, false));
        $this->found = false;
    }

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solveSudoku(&$board) {
        for ($i = 0; $i < 9; ++$i) {
            for ($j = 0; $j < 9; ++$j) {
                if ($board[$i][$j] != '.') {
                    $this->row[$i][ord($board[$i][$j]) - ord('1')] = true;
                    $this->col[$j][ord($board[$i][$j]) - ord('1')] = true;
                    $this->grid[intval(($i / 3)) * 3 + intval(($j / 3)) % 3][ord($board[$i][$j]) - ord('1')] = true;
                }
            }
        }
        self::place(0, $board);
        return;
    }
    function place($n, &$board) {
        if ($n == 81) {
            // board = g;
            $this->found = true;
            return;
        }
        
        $i = intval($n / 9); $j = $n % 9;
        $index = intval(($i / 3)) * 3 + intval(($j / 3)) % 3;
        if ($board[$i][$j] == '.') {
            for ($c = 0; $c < 9; ++$c) {
                if (!$this->row[$i][$c] && !$this->col[$j][$c] && !$this->grid[$index][$c]) {
                    $this->row[$i][$c] = true;
                    $this->col[$j][$c] = true;
                    $this->grid[$index][$c] = true;
                    $board[$i][$j] = chr($c + ord('1'));
                    
                    self::place($n + 1, $board);
                    
                    if ($this->found)
                        return;
                    
                    $board[$i][$j] = '.';
                    $this->row[$i][$c] = false;
                    $this->col[$j][$c] = false;
                    $this->grid[$index][$c] = false;
                    
                }
            }
        }
        else 
            self::place($n + 1, $board);
        return;
    }
}
