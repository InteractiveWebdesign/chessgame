<?php

class Knight extends Piece {
    public function __construct($color, $row = null, $col = null) {
        parent::__construct($color, $row, $col, 'Knight');
    }

    public function getType()
    {
        return 'Knight';
    }

    // Check if the knight's move is valid
    public function isValidMove($newRow, $newCol) {
        $rowDiff = abs($newRow - $this->getRow());
        $colDiff = abs($newCol - $this->getCol());

        return ($rowDiff == 1 && $colDiff == 2) || ($rowDiff == 2 && $colDiff == 1);
    }

    // Check if the knight can capture a piece at the given position
    public function canCapture($newRow, $newCol) {
        return $this->isValidMove($newRow, $newCol);
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
