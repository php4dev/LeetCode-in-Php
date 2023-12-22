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
    function levelOrder($root) {
      $lists=[];
      self::levelOrderTraverse($root,0,$lists);
      return $lists;
    }

    function levelOrderTraverse($root,$depth,&$lists) {
        if($root==null){
            return ;
        }
        if(count($lists)<=$depth){
            array_push($lists, []);
            array_push($lists[$depth], $root->val);
        }else{
            array_push($lists[$depth], $root->val);
        }

        self::levelOrderTraverse($root->left,$depth+1,$lists);
        self::levelOrderTraverse($root->right,$depth+1,$lists);
    }
}
