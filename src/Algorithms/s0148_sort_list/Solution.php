<?php

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
    function sortList($head) {
        if ($head == null || $head->next == null)
            return $head;
        $slow = $head;
        $fast = $head;
        $pre = $slow;
        while ($fast != null && $fast->next != null) {
            $pre = $slow;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        $pre->next = null;
        $first = self::sortList($head);
        $second = self::sortList($slow);
        $res = new ListNode(1);
        $cur = $res;
        while ($first != null || $second != null) {
            if ($first == null) {
                $cur->next = $second;
                break;
            } else if ($second == null) {
                $cur->next = $first;
                break;
            } else if ($first->val <= $second->val) {
                $cur->next = $first;
                $first = $first->next;
                $cur = $cur->next;
            } else {
                $cur->next = $second;
                $second = $second->next;
                $cur = $cur->next;
            }
        }
        return $res->next;
    }
}
