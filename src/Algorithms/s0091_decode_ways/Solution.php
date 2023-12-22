class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        if(strlen($s) == 0)
			return 0;
		
		$prev = 26;
		$result = 0;
		$first = 1; $second = 1;
		
		for($i = strlen($s) - 1; $i >= 0; $i--)
		{
			$digit = ord($s[$i]) - ord('0');
			
			if($digit == 0)
				$result = 0;
			else 
				$result = $first + ($digit * 10 + $prev <= 26 ? $second : 0);
			
			$second = $first;
			$first = $result; 
			$prev = $digit;
		}
		return $result;
    }
}
