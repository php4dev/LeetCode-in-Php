class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function multiply($num1, $num2) {
        if ($num1 == "0" || $num2 == "0") return "0";
        $res = array_fill(0, strlen($num1) + strlen($num2), 0);
        $a = 0;
        for ($i = strlen($num2) - 1; $i >= 0; $i--) {
            $b = 0;
            for ($j = strlen($num1) - 1; $j >= 0; $j--) {
                $prod = (ord($num1[$j]) - ord('0')) * (ord($num2[$i]) - ord('0'));
                $prod += $res[$a+$b];
                $carry = intval($prod/10);
                $digit = $prod%10;
                $res[$a+$b] = $digit;
                $res[$a+$b+1] += $carry;
                $b++;
            }
            $a++;
        }
        $sb = "";
        for ($i = count($res) - 1; $i >= 0; $i--) {
            if ($i == count($res) -1 && $res[count($res) - 1] == 0) continue;
            $sb .= chr($res[$i] + ord('0'));
        }
        return $sb;
    }
}
