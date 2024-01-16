<?php

class Solution {
    public function __construct() {
        $this->phone = [
            "2" => "abc",
            "3" => "def",
            "4" => "ghi",
            "5" => "jkl",
            "6" => "mno",
            "7" => "pqrs",
            "8" => "tuv",
            "9" => "wxyz"
        ];
        $this->output = [];
    }

    function backtrack($combination, $next_digits) {
        // if there is no more digits to check
        if (strlen($next_digits) == 0) {
            // the combination is done
            array_push($this->output, $combination);
        } // if there are still digits to check
        else {
            // iterate over all letters which map
            // the next available digit
            $digit = substr($next_digits, 0, 1);
            $letters = $this->phone[$digit];
            for ($i = 0; $i < strlen($letters); $i++) {
                $letter = substr($this->phone[$digit], $i, 1);
                // append the current letter to the combination
                // and proceed to the next digits
                self::backtrack($combination . $letter, substr($next_digits, 1));
            }
        }
    }

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        if (strlen($digits) != 0)
            self::backtrack("", $digits);
        return $this->output;
    }
}
