<?php

// #Medium #Top_100_Liked_Questions #Top_Interview_Questions #String #Dynamic_Programming
// #Data_Structure_II_Day_9_String #Algorithm_II_Day_14_Dynamic_Programming
// #Dynamic_Programming_I_Day_17 #Udemy_Strings #Big_O_Time_O(n)_Space_O(n)
// #2024_01_16_Time_1146_ms_(40.69%)_Space_37.4_MB_(6.37%)

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        if (strlen($s) == 0) {
            return $s;
        }
        $dp = array_fill(0, strlen($s), array_fill(0, strlen($s), false));
        $longestPalindromeStart = 0;
        $longestPalindromeLength = 1;
        for ($i = strlen($s) - 1; $i >= 0; $i--) {
            $dp[$i][$i] = true;  //single character is a palindrome so making it true
            for ($j = $i + 1; $j < strlen($s); $j++) {
                if (($s[$i] == $s[$j] && $dp[$i + 1][$j - 1]) || ($i + 1 == $j && $s[$i] == $s[$j])) { //checking for two edge cases 1.if characters are equal check for diagonal lower left one if true make it true 2. or if both equal and its the first elelment in the loop make it as true
                    $dp[$i][$j] = true;
                    if ($j - $i + 1 > $longestPalindromeLength) { // update the length if greater than previous
                        $longestPalindromeLength = $j - $i + 1;
                        $longestPalindromeStart = $i;
                    }
                }
            }
        }
        // return the substring using starting and ending index
        return substr($s, $longestPalindromeStart, $longestPalindromeLength);
    }
}
