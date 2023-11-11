<?php

// htdocs/models/Pawn.php

class Pawn extends Piece {
    public function __construct($color, $row = null, $col = null) {
        parent::__construct($color, $row, $col, 'Pawn');
    }

    public function getType()
    {
        return 'Pawn';
    }

    public function move($newRow, $newCol) {
        // Add logging to check if the move method is being called
        error_log("Piece moved to $newCol$newRow");

        // Check if the move is valid for a pawn
        if ($this->isValidMove($newRow, $newCol)) {
            parent::move($newRow, $newCol);
            // Add logging to check the final position
            error_log("Piece now at $newCol$newRow");
        } else {
            throw new Exception("Invalid move for the pawn.");
        }
    }

    public function isValidMove($newRow, $newCol)
    {
        // Implement your specific pawn movement logic here
        $currentRow = $this->getRow();
        $currentCol = $this->getCol();

        // Pawns can move forward by one square
        $forwardDirection = ($this->getColor() === 'white') ? -1 : 1;
        $rowDiff = $newRow - $currentRow;
        $colDiff = abs($newCol - $currentCol);

        // Check if the move is one square forward
        if ($rowDiff == $forwardDirection && $colDiff == 0) {
            return true;
        }

        // Implement additional logic for special moves, capturing, etc.

        return false;
    }

    // Additional methods and overrides specific to the Pawn class
}
