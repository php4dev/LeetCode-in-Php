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
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        if($inorder==null || count($inorder)==0 || $postorder==null || count($postorder)==0) return null;
        return self::recursive($inorder, 0, count($inorder)-1, $postorder, count($postorder)-1);
    }
    
    function recursive($inorder, $inStart, $inEnd, $postorder, $postEnd) {
        if($inStart>$inEnd || $postEnd<0) return null;
        $root=new TreeNode($postorder[$postEnd]);
        /**
			manually check the index of postorder[postEnd] in inorder arr
		**/
        $index=0;
        while($inorder[$index]!=$root->val) $index++;
        $root->left=self::recursive($inorder, $inStart, $index-1, $postorder, $postEnd-1-($inEnd-$index));
        $root->right=self::recursive($inorder, $index+1, $inEnd, $postorder, $postEnd-1);
        return $root;
    }
}
