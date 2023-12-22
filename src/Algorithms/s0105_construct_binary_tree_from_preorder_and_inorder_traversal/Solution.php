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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        $map = [];
        for ($i = 0; $i < count($inorder); $i++) {
            $map[$inorder[$i]] = $i;
        }
        return self::helper($preorder, $inorder, $map, 0, 0, count($inorder) - 1);
    }
    function helper($preorder, $inorder, $map, $index, $start, $end) {
        if ($index >= count($preorder) || $start > $end) {
            return null;
        }
        $root = new TreeNode($preorder[$index]);
        $k = $map[$root->val];
        $root->left = self::helper($preorder, $inorder, $map, $index + 1, $start, $k - 1);
        $root->right = self::helper($preorder, $inorder, $map, $index + 1 + $k - $start, $k + 1, $end);
        return $root;
    }
}
