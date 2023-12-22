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

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum) {
        $s=0;
        return self::hasPathSumUtil($root,$sum,$s);
    }

    function hasPathSumUtil($root, $sum, $s)
    {
        if($root == null)
            return false;
        if($root->left==null && $root->right==null)
        {
            $s = $s + $root->val;
            if ($s == $sum)
                return true;
            return false;
        }
        $s = $s + $root->val;
        $left = self::hasPathSumUtil($root->left, $sum, $s);
        $right = self::hasPathSumUtil($root->right, $sum, $s);

        if($left || $right)
            return true;

        return false;
    }
}
