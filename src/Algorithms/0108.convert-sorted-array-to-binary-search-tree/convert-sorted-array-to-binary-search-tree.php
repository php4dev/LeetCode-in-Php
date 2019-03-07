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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($num) {
        /*1. Set up recursion*/
        return self::makeTree($num, 0, count($num)-1);
    }
    
    function makeTree($num, $left, $right){
        /*2. left as lowest# can't be greater than right*/
        if($left>$right) return null;
        
        /*3. Set median# as node*/
        $mid = intval(($left+$right)/2);
        $midNode = new TreeNode($num[$mid]);
        
        /*4. Set mid node's kids*/
        $midNode->left = self::makeTree($num, $left, $mid-1);
        $midNode->right = self::makeTree($num, $mid+1, $right);
        
        /*5. Sends node back || Goes back to prev node*/
        return $midNode;
    }
}
