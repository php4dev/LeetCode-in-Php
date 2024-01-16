<?php

class Solution {

    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        $stack = [];
        $conVal = 0;
        $res = 0;

        if (count($tokens) < 2) return intval($tokens[0]);
        foreach ($tokens as $s) {
            if (($s == "+") || ($s == "-") || ($s == "*") || ($s == "/")) {
                switch ($s) {
                    case "+" :
                        $res = array_pop($stack) + array_pop($stack);
                        array_push($stack, $res);
                        break;
                    case "-" :
                        $x = array_pop($stack);
                        $y = array_pop($stack);
                        $res = $y - $x;
                        array_push($stack, $res);
                        break;
                    case "*" :
                        $res = array_pop($stack) * array_pop($stack);
                        array_push($stack, $res);
                        break;
                    case "/" :
                        $a = array_pop($stack);
                        $b = array_pop($stack);
                        if ($b == 0) $res = 0;
                        else $res = intval($b / $a);
                        array_push($stack, $res);
                        break;
                }
            } else {
                $conVal = intval($s);
                array_push($stack, $conVal);
            }
        }
        return $res;
    }
}
