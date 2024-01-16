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
     * @param Integer $m
     * @param Integer $n
     * @return ListNode
     */
    function reverseBetween($head, $m, $n) {
        $dummy = new ListNode(-1);
        $pre;
        $cur;
        $connection;
        $tail; // tail points to the last node of the reversed sub-list
        $pre = $dummy;
        $dummy->next = $head;

        // this loop aims to find the connection node and the first node to be reversed.
        for ($i = 0; $i < $m - 1; $i++) {
            $pre = $pre->next;
        }
        $connection = $pre;
        $tail = $cur = $pre->next;

        $temp;
        // this loop is just like the similar problem(https://leetcode.com/problems/reverse-linked-list/)
        for ($i = $m; $i <= $n; $i++) {
            $temp = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $temp;
        }

        // adjust the connection points
        $tail->next = $cur;
        $connection->next = $pre;
        return $dummy->next;
    }
}
