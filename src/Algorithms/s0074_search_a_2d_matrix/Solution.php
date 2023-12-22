class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        if ($matrix == null || count($matrix) == 0 || $matrix[0] == null || count($matrix[0]) == 0) return false;
        $col = count($matrix[0]) - 1;
        $row = 0;
		// start from the up left corner, if smaller than target, then go down, if larger then go left
        while ($row < count($matrix) && $col >= 0) {
            if ($matrix[$row][$col] == $target) return true;
            if ($matrix[$row][$col] < $target) $row++;
            else $col--;
        }
        return false;
    }
}
