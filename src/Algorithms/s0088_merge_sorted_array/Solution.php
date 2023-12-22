class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $i = $m-1; $j = $n-1; $x = count($nums1);
        for($c = count($nums1) - 1; $c >= 0; $c--) {
            if ($i>=0 && $j>=0 && $nums1[$i] >= $nums2[$j]) {
                $nums1[$c] = $nums1[$i];
                --$i;
            } else if ($i>=0 && $j>=0 && $nums2[$j] > $nums1[$i]) {
                $nums1[$c] = $nums2[$j];
                --$j;
            } else if($i<0 && $j>=0) {
                $nums1[$c] = $nums2[$j];
                --$j;
            } else {
                $nums1[$c] = $nums1[$i];
                --$i;
            }
        }
    }
}
