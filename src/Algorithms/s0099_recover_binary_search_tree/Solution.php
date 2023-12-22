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
    function recoverTree($root) {
        $stack = [];
        $current = $root; $prev = null; $first = null; $second = null;
        while ($current != null || count($stack) != 0) {
            while ($current != null) {
                array_push($stack, $current);
                $current = $current->left;
            }
            $current = array_pop($stack);
            if ($prev != null && $current->val < $prev->val) {
                if ($first == null) $first = $prev;
                $second = $current;
            } 
            $prev = $current; $current = $current->right;
        }
        // swap
        $temp = $first->val; $first->val = $second->val; $second->val = $temp;        
    }
}
