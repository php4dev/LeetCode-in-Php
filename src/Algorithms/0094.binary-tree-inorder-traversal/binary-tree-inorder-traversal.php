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

    var $elements = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function inorderTraversal($root) {
        if ($root == null) {
            return $this->elements;
        }
        self::inorderTraversal($root->left);
        array_push($this->elements, $root->val);
        self::inorderTraversal($root->right);
        return $this->elements;
    }
}
