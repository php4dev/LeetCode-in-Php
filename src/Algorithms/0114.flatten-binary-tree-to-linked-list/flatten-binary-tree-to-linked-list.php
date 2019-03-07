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
     * @return NULL
     */
    function flatten($root) {
        if($root==null){
            return;
        }
        self::flatten($root->left);
        self::flatten($root->right);
        $left=$root->left;
        $right=$root->right;
        $root->left = null;
        $root->right = $left;
        $temp=$root;
        while($temp->right != null){
            $temp = $temp->right;
        }
        $temp->right = $right;
    }
}
