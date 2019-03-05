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
     * @return Boolean
     */
    function isSymmetric($root) {
        //1. Top empty, return symmetric!
        if($root == null) return true;
        
        //2. Recursion method: Single null always symm, so just put kids in.
        return self::helper($root->left, $root->right);
    }
    
    function helper($left, $right){
        //3. Both must be null, or false
        if($left==null || $right==null)
            return $left==$right;
        
        //4. Check values and next level of children
        return $left->val==$right->val && self::helper($left->left, $right->right) && self::helper($left->right, $right->left);
    }
}
