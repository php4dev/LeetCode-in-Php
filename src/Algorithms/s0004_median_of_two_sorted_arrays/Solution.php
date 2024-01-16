<?php

// #Hard #Top_100_Liked_Questions #Top_Interview_Questions #Array #Binary_Search #Divide_and_Conquer
// #Big_O_Time_O(log(min(N,M)))_Space_O(1) #2024_01_16_Time_28_ms_(75.00%)_Space_19.6_MB_(54.49%)

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $array = range(0, count($nums1) + count($nums2) - 1);
        $p = 0;
        $q = 0;


        for ($i = 0; $i < count($array); $i++) {
            if (($p < count($nums1) && $q < count($nums2) && $nums1[$p] <= $nums2[$q]) || $q == count($nums2)) {
                $array[$i] = $nums1[$p];
                $p++;
            } else if (($p < count($nums1) && $q < count($nums2) && $nums1[$p] > $nums2[$q]) || $p == count($nums1)) {
                $array[$i] = $nums2[$q];
                $q++;
            }
        }

        if (intval(count($array) % 2) == 0) {
            return doubleval($array[count($array) / 2] + $array[(count($array) / 2) - 1]) / 2;
        } else {
            return doubleval($array[count($array) / 2]);
        }
    }
}
