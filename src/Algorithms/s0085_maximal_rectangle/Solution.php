class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) {
        $maxSize = 0;
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[0]); $j++) {
                if ($matrix[$i][$j] == '1') {
                    $maxSize = max(self::rectangleSize($matrix, $i, $j), $maxSize);
                }
            }
        }
        
        return $maxSize;
    }
    
    function rectangleSize(&$matrix, $row, $col) {
        $maxSize; $rowSize; $size;
        $i = $row + 1; $j = $col + 1; 
        $maxSize = $rowSize = $size = 1;
        
        while ($i < count($matrix) && $matrix[$i++][$col] == '1') {
            $rowSize++;
        }

        $maxSize = $size = $rowSize;
        
        while ($j < count($matrix[0])) {
            if ($matrix[$row][$j] == '0' ) {
                break;
            }
            
            for ($k = $row; $k < $row + $rowSize; $k++) {
                if ($matrix[$k][$j] == '0') { //if a '0' is found, reshape the rectangle
                    $oldrowSize = $rowSize;
                    $rowSize = $k - $row;
                    $size -= ($j - $col) * ($oldrowSize - $rowSize);
                }
            }
            
            $size += $rowSize;
            $maxSize = max($maxSize, $size);
            $j++;
        }
        
        return $maxSize;
    }
}
