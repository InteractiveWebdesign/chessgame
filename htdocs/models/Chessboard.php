<?php

class Chessboard {
    private $board;

    public function __construct() {
        // Initialize the board with pieces in the starting positions
        $this->resetBoard();
    }

    public function displayBoard() {
        // Display the current state of the chessboard with Tailwind CSS styling
        echo '<div class="flex justify-center items-center h-screen">';
        echo '<table class="table-auto border-collapse w-80">';
        for ($row = 0; $row < 8; $row++) {
            echo '<tr>';
            for ($col = 0; $col < 8; $col++) {
                $color = ($row + $col) % 2 == 0 ? 'bg-white' : 'bg-black';
                echo '<td class="w-10 h-10 ' . $color . '"></td>';
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
