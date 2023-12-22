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
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        $cur = $head;
        while ($cur != null && $cur->next != null){
           
            $temp = $cur->val;
            $cur->val = $cur->next->val;
            $cur->next->val = $temp;
            $cur = $cur->next->next;
        }

        return $head;
    }
}
