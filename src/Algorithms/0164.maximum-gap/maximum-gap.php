class Bucket {
    var $leftClose;
    var $rightOpen;
    var $usedFlag;

    function __construct() {
        $this->leftClose = 0;
        $this->rightOpen = 0;
        $this->usedFlag = false;
    }
}

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maximumGap($nums) {
        if ($nums==null || count($nums)<2) {
            return 0;
        }

        // find the maximum value and the minimum value in array
        $max = $nums[0];
        $min = $nums[0];
        foreach ($nums as $num) {
            $max = $max<$num ? $num : $max;
            $min = $min>$num ? $num : $min;
        }

        // the size of bucket must > 1
        $bucketSize = intval(max(1, ($max - $min) / (count($nums) - 1)));
        $bucketNum = intval(($max-$min) / $bucketSize + 1);

        $buckets = array_fill(0, $bucketNum, null);
        for ($i=0; $i<count($buckets); $i++) {
            $buckets[$i] = new Bucket();
        }

        // locating correct bucket
        foreach ($nums as $num) {
            $bucketIndex = intval(($num - $min) / $bucketSize);

            if ($buckets[$bucketIndex]->usedFlag == false) {
                $buckets[$bucketIndex]->leftClose = $num;
                $buckets[$bucketIndex]->rightOpen = $num;
                $buckets[$bucketIndex]->usedFlag = true;
            } else {
                $buckets[$bucketIndex]->leftClose = min($num, $buckets[$bucketIndex]->leftClose);
                $buckets[$bucketIndex]->rightOpen = max($num, $buckets[$bucketIndex]->rightOpen);
            }
        }

        $maxGap = 0;
        $preRightOpen = $buckets[0]->rightOpen;
        for ($i=1; $i<count($buckets); $i++) {
            if ($buckets[$i]->usedFlag == false) {
                continue;
            }
            $maxGap = max($maxGap, $buckets[$i]->leftClose-$preRightOpen);
            $preRightOpen = $buckets[$i]->rightOpen;
        }

        return $maxGap;
    }
}
