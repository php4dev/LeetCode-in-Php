class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        if ($x <= 1) return $x;
        return self::binarySearch(1, intval($x / 2) + 1, $x);
    }

    function binarySearch($l, $r, $val) {
        while ($l < $r) {
            $m = intval(($r - $l) / 2) + $l;
            $v = $m * $m;
            if ($v == $val) return $m;
            else if ($v > $val) {
                $r = $m;
            } else {
                $l = $m + 1;
            }
        }
        return $l - 1;
    }
}
