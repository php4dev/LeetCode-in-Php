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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        if($p == null && $q == null)
            return true;
        
        if($p == null || $q == null)
            return false;
        
        return ($p->val == $q->val) && self::isSameTree($p->left, $q->left) && self::isSameTree($p->right,$q->right);   
    }
}
