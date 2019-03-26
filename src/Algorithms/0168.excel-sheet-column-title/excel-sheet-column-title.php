class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function convertToTitle($n) {
        $mapping = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $sb = "";
        while($n > 0) {
            $sb .= $mapping [--$n % 26]; //Since for a base 26 the numbers would be from 0 to 25. Deducting 1
            $n = intval($n / 26);
        }
        return strrev($sb);
    }
}
