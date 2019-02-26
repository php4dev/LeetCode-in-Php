/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $res = new ListNode(0);
        $cur = $res;
        while ($l1 != null || $l2 != null) {
            if ($l1 == null) {
                $cur->next = new ListNode($l2->val);
                $l2 = $l2->next;
            } else if ($l2 == null) {
                $cur->next = new ListNode($l1->val);
                $l1 = $l1->next;
            } else {
                if ($l1->val < $l2->val) {
                    $cur->next = new ListNode($l1->val);
                    $l1 = $l1->next;
                } else {
                    $cur->next = new ListNode($l2->val);
                    $l2 = $l2->next;
                }
            }
            $cur = $cur->next;
        }
        
        return $res->next;
    }
}
