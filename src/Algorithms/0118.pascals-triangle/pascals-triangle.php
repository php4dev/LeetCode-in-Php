class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        $ans=[];
        if($numRows==0)
        	return $ans;
        $t1=[];
        
        array_push($t1, 1);
        $count=0;
        while($count!=$numRows) {
        	array_push($ans, $t1);
        	$t2=[];
        	array_push($t2, 1);
        	for($i=1;$i<count($t1);$i++) 
        		array_push($t2, $t1[$i-1]+$t1[$i]);
        	array_push($t2, 1);
        	
        	$t1=$t2;
        	$count++;
        }
        return $ans; 
    }
}
