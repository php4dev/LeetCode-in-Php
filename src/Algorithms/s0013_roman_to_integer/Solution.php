class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $map = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' =>  1000];
        
        $result = 0;
        for($i = 0; $i < strlen($s); $i++) {
            $first = $map[$s[$i]];
            if($i <= strlen($s) - 2) {
                $second = $map[$s[$i + 1]];
                if($second > $first) {
                    $result += $second - $first;
                    $i++;
                }
                else {
                    $result += $first;
                }
            }
            else
                $result += $first;
        }
        
        return $result;
    }
}