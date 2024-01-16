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
    function deleteDuplicates($head) {
        if ($head == null || $head->next == null) return $head;
        $dummy = new ListNode(-1);
        $dummy->next = $head;
        $prev = $dummy;
        $slow = $dummy->next;
        $fast = $slow->next;
        while ($slow != null && $fast != null) {
            if ($slow->val == $fast->val) {
                while ($fast != null && $slow->val == $fast->val) {
                    $fast = $fast->next;
                }
                $prev->next = $fast;
                $slow = $prev->next;
                $fast = $slow == null ? null : $slow->next;
            } else {
                $prev = $slow;
                $slow = $slow->next;
                $fast = $fast->next;
            }
        }
        return $dummy->next;
    }
}
