<?php

class Queen extends Piece {
    
    public function __construct($color, $row = null, $col = null) {
        parent::__construct($color, $row, $col);
    }

    // Check if the queen's move is valid
    public function isValidMove($newRow, $newCol) {
        $rowDiff = abs($newRow - $this->getRow());
        $colDiff = abs($newCol - $this->getCol());

        return $rowDiff == $colDiff || $this->getRow() == $newRow || $this->getCol() == $newCol;
    }

    // Check if the queen can capture a piece at the given position
    public function canCapture($newRow, $newCol) {
        return $this->isValidMove($newRow, $newCol);
    }

    // Override the move method
    public function move($newRow, $newCol) {
        if ($this->isValidMove($newRow, $newCol)) {
            parent::move($newRow, $newCol);
        } else {
            throw new Exception("Invalid move for the queen.");
        }
    }

    // Additional methods and overrides specific to the Queen class
}
