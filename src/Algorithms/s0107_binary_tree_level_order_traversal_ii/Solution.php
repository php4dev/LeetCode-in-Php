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
     * @return Integer[][]
     */
    function levelOrderBottom($root) {
        $result = [];
		// Hit the end, return an empty list directly
        if ($root == null) {
            return $result;
        }
        
        $self = [];
        array_push($self, $root->val);
        
        $left = self::levelOrderBottom($root->left);
        $right = self::levelOrderBottom($root->right);
        
        // Return directly on leaf will cause the depth of left/right tree are not the same
        // need to merge the lists based on different index.
        $startIdx = abs(count($left) - count($right));
        if (count($left) >= count($right)) {
            for ($i = $startIdx, $j = 0; $j < count($right); $j++) {
                array_push($left[$i + $j], ...$right[$j]);
            }
            array_push($left, $self);
            return $left;
        } else {
            for ($i = $startIdx, $j = 0; $j < count($left); $j++) {
                array_splice($right[$i + $j], 0, 0, $left[$j]);
            }
            array_push($right, $self);
            return $right;
        }
    }
}
