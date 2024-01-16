<?php

class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        if (($board == null) || count($board) == 0 || count($board[0]) == 0)
            return;
        for ($row = 0; $row < count($board); $row++) {
            for ($col = 0; $col < count($board[0]); $col++) {
                if (($row == 0) || ($row == count($board) - 1) || ($col == 0) || ($col == count($board[0]) - 1)) {
                    if ($board[$row][$col] == 'O') {
                        self::color($board, $row, $col);
                    }
                }
            }
        }

        for ($row = 0; $row < count($board); $row++) {
            for ($col = 0; $col < count($board[0]); $col++) {

                if ($board[$row][$col] == 'O') {
                    $board[$row][$col] = 'X';
                }
                if ($board[$row][$col] == 'V') {
                    $board[$row][$col] = 'O';
                }
            }
        }
    }

    function color(&$board, $row, $col) {
        $board[$row][$col] = 'V';
        if ($row + 1 < count($board)) {
            if ($board[$row + 1][$col] == 'O') {
                self::color($board, $row + 1, $col);
            }
        }
        if ($row - 1 >= 0) {
            if ($board[$row - 1][$col] == 'O') {
                self::color($board, $row - 1, $col);
            }
        }
        if ($col + 1 < count($board[0])) {
            if ($board[$row][$col + 1] == 'O') {
                self::color($board, $row, $col + 1);
            }
        }
        if ($col - 1 >= 0) {
            if ($board[$row][$col - 1] == 'O') {
                self::color($board, $row, $col - 1);
            }
        }
    }
}
