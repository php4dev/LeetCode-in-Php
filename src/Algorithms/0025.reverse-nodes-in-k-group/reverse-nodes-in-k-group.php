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
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        if($head==null || $k<2){
            return $head;
        }

        $temp = null;
        $curr = $head;
        $prev = null;
        $count = 0;
        
        while($count<$k && $curr!=null){
            $temp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $temp;
            $count++;
        }
        
        if($count<$k){
            while($count!=0){
                $temp = $prev->next;
                $prev->next = $curr;
                $curr = $prev;
                $prev = $temp;
                $count--;
            }
            return $curr;
        }
        
        $head->next = self::reverseKGroup($curr,$k);
        
        return $prev;
    }
}
