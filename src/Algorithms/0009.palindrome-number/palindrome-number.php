class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x<0) return false;
        $i = 0; $rev = 0; $ori = $x;
        for($i=10; $x>0; $x= intval($x / 10)){
            $rev *= 10;
            $rev += $x % $i;
        }
        return $rev==$ori;   
    }
}