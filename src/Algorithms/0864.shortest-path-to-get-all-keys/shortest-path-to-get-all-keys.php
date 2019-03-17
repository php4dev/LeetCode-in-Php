class Status {
    var $key;
    var $i;
    var $j;
    function __construct($key, $i, $j) {
        $this->key = $key;
        $this->i = $i;
        $this->j = $j;
    }
}

class Solution {

    /**
     * @param String[] $grid
     * @return Integer
     */
    function shortestPathAllKeys($grid) {
        $success = 0;
        $startI = 0;
        $startJ = 0;
        $rows = count($grid);
        $cols = strlen($grid[0]);
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                $c = $grid[$i][$j];
                if ($c >= 'A' && $c <= 'F') {
                    $success |= 1 << (ord($c) - ord('A'));
                }
                
                if ($c == '@') {
                    $startI = $i;
                    $startJ = $j;
                }
            }
        }
        $dist = array_fill(0, 1 << 6, array_fill(0, $rows, array_fill(0, $cols, 2147483647)));
        $queue = [];
        array_push($queue, new Status(0, $startI, $startJ));
        $dist[0][$startI][$startJ] = 0;
        $path = 0;
        $dirs = [[-1, 0], [0, 1], [1, 0], [0, -1]];
        while (!empty($queue)) {
            $size = count($queue);
            while ($size-- > 0) {
                $status = array_pop($queue);
                $key = $status->key;
                $x = $status->i;
                $y = $status->j;
                if ($key == $success) return $path;
                foreach ($dirs as $dir) {
                    $xx = $x + $dir[0];
                    $yy = $y + $dir[1];
                    if ($xx >= 0 && $xx < $rows && $yy >= 0 && $yy < $cols && $grid[$xx][$yy] != '#') {
                        $nextKey = $key;
                        $c = $grid[$xx][$yy];
                        if ($c >= 'a' && $c <= 'f') {
                            $nextKey = $key | (1 << (ord($c) - ord('a')));
                        }
                        
                        if ($c >= 'A' && $c <= 'F') {
                            if (($nextKey & (1 << (ord($c) - ord('A')))) == 0) continue;
                        }
                        
                        if ($path + 1 < $dist[$nextKey][$xx][$yy]) {
                            $dist[$nextKey][$xx][$yy] = $path + 1;
                            array_unshift($queue, new Status($nextKey, $xx, $yy));
                        }
                    }
                }
            }
            $path++;
        }
        return -1;
    }
}
