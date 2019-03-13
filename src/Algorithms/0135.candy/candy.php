class Solution {

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings) {
		$n = count($ratings);
		$sum = 0;
		$candies = array_fill(0, $n, 1);

		for($i = 1; $i < $n; $i++)
		{
			if($ratings[$i] > $ratings[$i - 1])
            {
                $candies[$i] = $candies[$i - 1] + 1;
            }
		}

		for($i = $n - 1; $i > 0; $i--)
		{
			if($ratings[$i - 1] > $ratings[$i] && $candies[$i - 1] <= $candies[$i])
            {
                $candies[$i - 1] = $candies[$i] + 1;
            }
		}

		foreach($candies as $candy)
			$sum += $candy;

		return $sum;
    }
}
