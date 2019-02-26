class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        $sb = "";
        $values = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
        $roman = ["M", "CM", "D", "CD", "C", "XC", "L", "XL", "X", "IX", "V", "IV", "I"];
        $i = 0;
        
        while($num > 0){
            $repeats = intval($num/$values[$i]);
            if($repeats >= 1){
                while($repeats != 0){
                    $sb .= $roman[$i];
                    $repeats--;
                }
                $num = $num - intval($num/$values[$i])*$values[$i];
            }
            $i++;
        }
        return $sb;
    }
}