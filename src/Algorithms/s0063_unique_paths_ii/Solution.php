class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {
     $rows = count($obstacleGrid);
     $cols = count($obstacleGrid[0]);
     $temp=array_fill(0, $rows, array_fill(0, $cols, 0));
        // If starting point is Obstacle, no way to reach end.
        if($obstacleGrid[0][0]==1)
            return 0;
        // Starting point.
        $temp[0][0]=1;
        for($row=0;$row<$rows;$row++){
            for ($col=0;$col<$cols;$col++){
                if($col==0 && $row==0)
                    continue;
                if($obstacleGrid[$row][$col]!=1){
                    $upVal=($row-1)<0?0: $temp[$row-1][$col];
                    $leftVal=($col-1)<0?0: $temp[$row][$col-1];
                    // Number of ways to reach current cell. 
                    // No. of ways to reach uppper cell + No.of ways to reach left cell.
                    $temp[$row][$col]=$upVal+$leftVal;
                }
               
            }
        }
      return $temp[$rows-1][$cols-1];
    }
}
