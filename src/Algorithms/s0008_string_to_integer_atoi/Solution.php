class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
	if (trim($str) == '')
		return 0;
	$str = trim($str);
	$i = 0; $ans = 0; $sign = 1; $len = strlen($str);
	if ($str[$i] == '-' || $str[$i] == '+')
		$sign = $str[$i++] == '+' ? 1 : -1;
	for (; $i < $len; ++$i) {
		$tmp = ord($str[$i]) - ord('0');
		if ($tmp < 0 || $tmp > 9)
			break;
		if ($ans > intval(2147483647 / 10)
				|| ($ans == intval(2147483647 / 10) && (2147483647 % 10) < $tmp)) {
			return $sign == 1 ? 2147483647 : -2147483648;
                } else
			$ans = $ans * 10 + $tmp;
       	}
	return $sign * $ans;
    }
}
