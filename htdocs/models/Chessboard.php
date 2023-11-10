<?php

class Chessboard {
    private $board;

    public function __construct() {
        // Initialize the board with pieces in the starting positions
        $this->resetBoard();
    }

    public function displayBoard() {
        // Display the current state of the chessboard with CSS styling
        echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">';
        echo '<table style="border-collapse: collapse; width: 80%;">';
        for ($row = 0; $row < 8; $row++) {
            echo '<tr>';
            for ($col = 0; $col < 8; $col++) {
                $color = ($row + $col) % 2 == 0 ? '#FFFFFF' : '#000000';
                echo '<td style="width: 50px; height: 50px; background-color: ' . $color . ';"></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    }

    public function resetBoard() {
        // Initialize the board with pieces in the starting positions
        $this->board = [
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
        ];
    }
}
