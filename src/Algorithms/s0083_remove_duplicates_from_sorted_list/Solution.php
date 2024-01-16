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
        $prev = $head;
        $node = $head->next;
        while ($node != null) {
            if ($node->val != $prev->val) {
                $prev = $node;
                $node = $node->next;
            } else {
                $prev->next = $node->next;
                $node = $node->next;
            }
        }
        return $head;
    }
}
