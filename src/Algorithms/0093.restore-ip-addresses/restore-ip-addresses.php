class Solution {

    var $s;
    var $res;
    var $parts;

    /**
     * @param String $s
     * @return String[]
     */
    function restoreIpAddresses($s) {
        $this->res = [];
        $this->s = $s;
        $this->parts = array_fill(0, 4, 0);
        self::helper(-1, 0, 0);
        return $this->res;
    }

    function helper($num, $nextIdx, $partIdx) {
        //base case, wraping up
        if ($partIdx >= 4) {
            return;
        }
        if ($nextIdx >= strlen($this->s)) {
            if ($partIdx == 3 && $num != -1) {
                $this->parts[$partIdx] = $num;
                self::parseIp();
            }
            return;
        }
        $nextDigit = ord($this->s[$nextIdx]) - ord('0');
        $possibleNum = $num == -1 ? $nextDigit : $num * 10 + $nextDigit;
        if ($possibleNum <= 255 ) {
            //trying increase this position next (if it's not 0)
            if ($possibleNum > 0 || ($possibleNum == 0 && $nextIdx == strlen($this->s) - 1))
                self::helper($possibleNum, $nextIdx + 1, $partIdx);
            //save for current position and try for next one from scratch
            $this->parts[$partIdx] = $possibleNum;
            self::helper(-1, $nextIdx + 1, $partIdx + 1);
            $this->parts[$partIdx] = -1;
        }
    }
    function parseIp() {
        $sb = "";
        for ($i = 0; $i < count($this->parts); $i++) {
            $sb .= $this->parts[$i];
            if ( $i < count($this->parts) - 1)
                $sb .= '.';
        }
        array_push($this->res, $sb);
    }

}
