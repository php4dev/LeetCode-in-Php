class Solution {

    var $list = [];

    function internal($s, $remainLeft, $remainRight) {
        if ($remainRight == 0) {
            $this->list[] = $s;
            return;
        }
        if ($remainLeft == 0) self::internal($s . ')', 0, $remainRight - 1);
        else if ($remainLeft == $remainRight) {
            self::internal($s . "(", $remainLeft - 1, $remainRight);
        } else if ($remainRight > $remainLeft) {
            self::internal($s . "(", $remainLeft - 1, $remainRight);
            self::internal($s . ')', $remainLeft, $remainRight - 1);
        }
    }

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        self::internal("", $n, $n);
        return $this->list;        
    }
}
