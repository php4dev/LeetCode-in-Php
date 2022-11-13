class Solution {

    /**
    * @param String $jewels
    * @param String $stones
    * @return Integer
    */
    function numJewelsInStones($jewels, $stones) {
        $counter = 0;
        for ($i = 0; $i < strlen($jewels); $i++) {
            $counter += substr_count($stones, $jewels[$i]);
        }
        return $counter;
    }
}