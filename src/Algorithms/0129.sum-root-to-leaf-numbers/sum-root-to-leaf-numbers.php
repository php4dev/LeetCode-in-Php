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
     * @return Integer
     */
    function sumNumbers($root) {
        return self::getSum($root,0);
        
    }
    
    function getSum($root, $sum){
        
        if($root == null)
            return 0;
        
        $sum = $sum * 10 + $root->val;
        
        if($root->left == null && $root->right == null)
            return $sum;
        
        return self::getSum($root->left,$sum) + self::getSum($root->right,$sum);
        
    }
}
