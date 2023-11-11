<?php

// htdocs/models/Pawn.php

class Pawn extends Piece {
    public function __construct($color, $row = null, $col = null) {
        parent::__construct($color, $row, $col, 'Pawn');
    }

    public function move($newRow, $newCol) {
        // Implement your specific pawn movement logic here
        // For example, you might check if the move is one square forward
        if ($this->getColor() === 'white') {
            if ($newRow == $this->getRow() - 1 && $newCol == $this->getCol()) {
                parent::move($newRow, $newCol);
            } else {
                throw new Exception("Invalid move for the pawn.");
            }
        } else {
            // Implement the logic for black pawn movement
            // ...
        }
    }

    // Additional methods and overrides specific to the Pawn class
}
