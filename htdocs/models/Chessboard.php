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
        echo '<div class="bg-gray-100 p-8 rounded-md">';
        echo '<table class="table-auto border-collapse w-full">';
        for ($row = 0; $row < 8; $row++) {
            echo '<tr>';
            for ($col = 0; $col < 8; $col++) {
                $color = ($row + $col) % 2 == 0 ? 'bg-gray-200' : 'bg-gray-400';
                $piece = $this->board[$row][$col];
                echo '<td class="w-10 h-10 ' . $color . '">';
                if ($piece) {
                    echo '<img src="' . $piece->getIcon() . '" alt="" class="w-full h-full">';
                }
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }


    public function resetBoard() {
        // Initialize the board with pieces in the starting positions
        $this->board = [
            [new Rook('white'), new Knight('white'), new Bishop('white'), new Queen('white'), new King('white'), new Bishop('white'), new Knight('white'), new Rook('white')],
            [new Pawn('white'), new Pawn('white'), new Pawn('white'), new Pawn('white'), new Pawn('white'), new Pawn('white'), new Pawn('white'), new Pawn('white')],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [null, null, null, null, null, null, null, null],
            [new Pawn('black'), new Pawn('black'), new Pawn('black'), new Pawn('black'), new Pawn('black'), new Pawn('black'), new Pawn('black'), new Pawn('black')],
            [new Rook('black'), new Knight('black'), new Bishop('black'), new Queen('black'), new King('black'), new Bishop('black'), new Knight('black'), new Rook('black')],
        ];
    }

    // Additional methods to handle piece movements and interactions on the board
}
