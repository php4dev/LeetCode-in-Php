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
    function rotateRight($head, $k) {
        if($head == null){
            return $head;
        }
        $k = ($k == 0) ? 0 : $k % self::getLen($head);
        if($k == 0){
            return $head;
        }
        $head1 = self::reverse(null, $head);
        $dummyHead = new ListNode(0);
        $dummyHead->next = $head1;
        $cur = $dummyHead->next;
        $pre = $dummyHead;
        while($k > 0){
            $pre = $cur;
            $cur = $cur->next;
            $k--;
        }
        $pre->next = null;
        $head2 = self::reverse(null, $cur);
        return self::reverse($head2, $head1);
    }
    function getLen($head){
        $cnt = 0;
        while($head != null){
            $cnt++;
            $head = $head->next;
        }
        return $cnt;
    }
    function reverse($pre,$head) {
        $tmp;
        $cur = $head;
        while($cur != null) {
            $tmp = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $tmp;
        }
        return $pre;
    }
}
