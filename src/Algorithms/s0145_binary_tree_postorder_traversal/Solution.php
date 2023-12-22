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
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $postOrder = [];
        $stack = [];
        $node = $root;
        while (!empty($stack) || $node != null) {
            while ($node != null) {
                array_push($stack, $node);
                array_unshift($postOrder, $node->val);
                $node = $node->right;
            }
            $node = array_pop($stack)->left;
        }
        return $postOrder;
    }
}
