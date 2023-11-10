<?php

class Knight extends Piece {
    public function __construct($color, $row, $col) {
        parent::__construct($color, $row, $col);
    }

    // Check if the knight's move is valid
    public function isValidMove($newRow, $newCol) {
        $rowDiff = abs($newRow - $this->getRow());
        $colDiff = abs($newCol - $this->getCol());

        return ($rowDiff == 1 && $colDiff == 2) || ($rowDiff == 2 && $colDiff == 1);
    }

    // Override the move method
    public function move($newRow, $newCol) {
        if ($this->isValidMove($newRow, $newCol)) {
            parent::move($newRow, $newCol);
        } else {
            throw new Exception("Invalid move for the knight.");
        }
    }

    // Additional methods and overrides specific to the Knight class
}
