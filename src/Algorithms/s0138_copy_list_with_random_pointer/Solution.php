<?php

/*
// Definition for a Node.
class Node {
    public $val;
    public $next;
    public $random;

    @param Integer $val 
    @param Node $next 
    @param Node $random 
    function __construct($val, $next, $random) {
        $this->val = $val;
        $this->next = $next;
        $this->random = $random;
    }
}
*/

class Solution {

    /**
     * @param Node $head
     * @return Node
     */
    function copyRandomList($head) {
        $iter = $head;
        $next;

        // First round: make copy of each node,
        // and link them together side-by-side in a single list.
        while ($iter != null) {
            $next = $iter->next;

            $copy = new Node($iter->val, null, null);
            $iter->next = $copy;
            $copy->next = $next;

            $iter = $next;
        }

        // Second round: assign random pointers for the copy nodes.
        $iter = $head;
        while ($iter != null) {
            if ($iter->random != null) {
                $iter->next->random = $iter->random->next;
            }
            $iter = $iter->next->next;
        }

        // Third round: restore the original list, and extract the copy list.
        $iter = $head;
        $pseudoHead = new Node(0, null, null);
        $copy;
        $copyIter = $pseudoHead;

        while ($iter != null) {
            $next = $iter->next->next;

            // extract the copy
            $copy = $iter->next;
            $copyIter->next = $copy;
            $copyIter = $copy;

            // restore the original list
            $iter->next = $next;

            $iter = $next;
        }

        return $pseudoHead->next;
    }
}
