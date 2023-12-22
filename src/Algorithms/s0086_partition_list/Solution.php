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
     * @param Integer $x
     * @return ListNode
     */
    function partition($head, $x) {
        if($head == null || $head->next == null) return $head;
		//split the answer into two part and then combine them, use prevPart and restPart as dummy heads;
        $prevPart = new ListNode(-1);
        $restPart = new ListNode(-1);
        $prev = $prevPart;
        $rest = $restPart;
        while($head != null){
            if($head->val < $x){
                $prev->next = new ListNode($head->val);
                $prev = $prev->next;
            }else{
                $rest->next = new ListNode($head->val);
                $rest = $rest->next;
            }
            $head = $head->next;
        }
        $tail = self::getTail($prevPart);
		//put `>= val` numbers at tail of `< val` numbers
        $tail->next = $restPart->next;
        return $prevPart->next;
    }
    
    function getTail($head){
        while($head->next != null){
            $head = $head->next;
        }
        return $head;
    }
}
