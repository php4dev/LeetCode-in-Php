/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
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
     * @param ListNode $head
     * @return TreeNode
     */
    function sortedListToBST($head) {
        $lst = [];
        while ($head != null) {
            array_push($lst, $head->val);
            $head = $head->next;
        }

        return self::helper($lst, 0, count($lst) - 1);
    }
    
    function helper($lst, $start, $end) {
        if ($start > $end) {
            return null;
        }
        if ($start == $end) {
            return new TreeNode($lst[$start]);
        }

        $mid = intval(($end + $start) / 2);
        $root = new TreeNode($lst[$mid]);

        $root->left = self::helper($lst, $start, $mid - 1);
        $root->right = self::helper($lst, $mid + 1, $end);

        return $root;
    }
}
