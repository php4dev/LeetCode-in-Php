class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $maxarea = 0; $l = 0; $r = count($height) - 1;
        while ($l < $r) {
            $maxarea = max($maxarea, min($height[$l], $height[$r]) * ($r - $l));
            if ($height[$l] < $height[$r])
                $l++;
            else
                $r--;
        }
        return $maxarea;
    }
}