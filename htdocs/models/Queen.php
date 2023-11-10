<?php

class Queen extends Piece {
    
    public function __construct($color, $row, $col) {
        parent::__construct($color, $row, $col);
    }

    public function move($row, $col) {
        if (abs($this->getRow() - $row) == abs($this->getCol() - $col)) {
            parent::move($row, $col);
        } else if ($this->getRow() == $row || $this->getCol() == $col) {
            parent::move($row, $col);
        } else {
            throw new Exception("Invalid move.");
        }
    }
}