<?php

class Bishop extends Piece {
    
    public function __construct($color, $row = null, $col = null) {
        parent::__construct($color, $row, $col);
    }

    // Check if the bishop's move is valid
    public function isValidMove($newRow, $newCol) {
        $rowDiff = abs($newRow - $this->getRow());
        $colDiff = abs($newCol - $this->getCol());

        return $rowDiff == $colDiff;
    }

    // Check if the bishop can capture a piece at the given position
    public function canCapture($newRow, $newCol) {
        return $this->isValidMove($newRow, $newCol);
    }

    // Override the move method
    public function move($newRow, $newCol) {
        if ($this->isValidMove($newRow, $newCol)) {
            parent::move($newRow, $newCol);
        } else {
            throw new Exception("Invalid move for the bishop.");
        }
    }

    // Additional methods and overrides specific to the Bishop class
}
