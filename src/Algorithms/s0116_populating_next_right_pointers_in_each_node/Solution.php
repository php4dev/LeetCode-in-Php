/*
// Definition for a Node.
class Node {
    public $val;
    public $left;
    public $right;
    public $next;

    @param Integer $val 
    @param Node $left 
    @param Node $right 
    @param Node $next 
    function __construct($val, $left, $right, $next) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
        $this->next = $next;
    }
}
*/
class Solution {

    /**
     * @param Node $root
     * @return Node
     */
    function connect($root) {
        if($root==null){
            return null;
        }     
        
        if($root->left!=null && $root->right!=null){
            $root->left->next = $root->right;
        }
        
        if($root->next!=null && $root->right!=null){
            $root->right->next=$root->next->left;
        }
        
        self::connect($root->left);
        self::connect($root->right);
        return $root;
    }
}
