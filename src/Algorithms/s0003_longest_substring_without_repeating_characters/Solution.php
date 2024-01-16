<?php

// #Medium #Top_100_Liked_Questions #Top_Interview_Questions #String #Hash_Table #Sliding_Window
// #Algorithm_I_Day_6_Sliding_Window #Level_2_Day_14_Sliding_Window/Two_Pointer #Udemy_Strings
// #Big_O_Time_O(n)_Space_O(1) #2024_01_16_Time_14_ms_(75.32%)_Space_19.8_MB_(36.83%)

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if (strlen($s) == 0) return 0;
        $map = [];
        $max = 0;
        for ($i = 0, $j = 0; $i < strlen($s); ++$i) {
            if (array_key_exists($s[$i], $map)) {
                $j = max($j, $map[$s[$i]] + 1);
            }
            $map[$s[$i]] = $i;
            $max = max($max, $i - $j + 1);
        }
        return $max;
    }
}
