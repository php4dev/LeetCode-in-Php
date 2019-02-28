class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        if ($dividend == -2147483648 && $divisor == -1) return 2147483647;
        if (abs($divisor) == 1) {
            if ($divisor > 0) return $dividend;
            else return -$dividend;
        }
        $l1 = abs($dividend); $l2 = abs($divisor);
        $sol = 0;
        while($l1 >= $l2){
            $x = $l2; $y = 1;
            while($l1 >= $x){
                $l1-=$x;
                $sol+=$y;
                $y+=$y;
                $x+=$x;
            }
        }
        if ($dividend > 0 && $divisor < 0 || $dividend<0 && $divisor>0) $sol = -$sol;
        return $sol;
    }
}
