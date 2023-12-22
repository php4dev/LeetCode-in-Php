/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    var $maxSum = -2147483647;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxPathSum($root) {
        self::helper($root);
        return $this->maxSum;
    }
    
    function helper($root) {
        if($root == null) return 0;
        $left = self::helper($root->left);
        $right = self::helper($root->right);
        $rootLeft = $left + $root->val;
        $rootRight = $right + $root->val;
        $ret = max(max($rootLeft, $rootRight), $root->val);
        $compSum = $root->val;
        if($left > 0) $compSum += $left;
        if($right > 0) $compSum += $right;
        $this->maxSum = max($this->maxSum, $compSum);
        return $ret;
    }
}
