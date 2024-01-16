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
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        if (count($lists) == 0) {
            return null;
        }
        $l = null;
        for ($i = 0; $i < count($lists); ++$i) {
            $l = self::mergeTwoLists($l, $lists[$i]);
        }
        return $l;
    }

    // AC in LeetCode-23 Merge Two Sorted Lists
    function mergeTwoLists($l1, $l2) {
        if ($l1 == null) {
            return $l2;
        } else if ($l2 == null) {
            return $l1;
        }

        $head = new ListNode(-1);
        $cur = $head;
        while ($l1 != null && $l2 != null) {
            $cur->next = $l1->val <= $l2->val ? $l1 : $l2;
            $cur = $cur->next;
            if ($cur->val == $l1->val) {
                $l1 = $l1->next;
            } else {
                $l2 = $l2->next;
            }
        }
        $cur->next = $l1 != null ? $l1 : $l2;
        return $head->next;
    }
}
