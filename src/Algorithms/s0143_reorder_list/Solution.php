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
     * @return NULL
     */
    function reorderList($head) {
        if($head == null) return;
        $slow = $head;
        $fast = $head;

        while($fast != null && $fast->next != null){
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        
        $next = null;
        $curr = $slow;
        $prev = null;
        while($curr != null){
            $next = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $next;
        }
        
        $temp;
        while($prev != null && $head->next != null){
            $temp = $head->next;
            $head->next = $prev;
            $head = $temp;

            $temp = $prev->next;
            $prev->next = $head;
            $prev = $temp;
        }
        $head->next = null;
    }
}
