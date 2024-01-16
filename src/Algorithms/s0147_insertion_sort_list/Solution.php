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
    function insertionSortList($head) {
        if ($head == null || $head->next == null) return $head;
        $tmp;
        $k;
        $z;
        for ($start = $head; $start->next != null; $start = $start->next) {
            $tmp = $start->next;
            $k = $tmp->val;
            $end;
            for ($end = $head; $end != $start->next; $end = $end->next) {
                if ($tmp->val < $end->val) {
                    $z = $end->val;
                    $end->val = $k;
                    $k = $z;
                }
            }
            $end->val = $k;
        }
        return $head;
    }
}
