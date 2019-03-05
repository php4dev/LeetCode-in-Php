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
    function zigzagLevelOrder($root) {
        $leftRight = true;
        $result = [];
        $queue = [];
        if ($root != null) array_push($queue, $root);
        while (count($queue)  > 0){
            $size = count($queue);
            $list = [];
            for ($i = 0; $i < $size; $i++){
                $node = array_shift($queue);
                if ($leftRight){
                    array_push($list, $node->val);
                } else {
                    array_splice($list, 0, 0, $node->val);
                }
                if ($node->left != null) array_push($queue, $node->left);
                if ($node->right != null) array_push($queue, $node->right);
            }
            array_push($result, $list);
            $leftRight = !$leftRight;
        }
        
        return $result; 
    }
}
