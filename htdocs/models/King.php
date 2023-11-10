<?php

class King extends Piece {
    public function __construct($color, $row, $col) {
        parent::__construct($color, $row, $col);
    }

    public function move($row, $col) {
        if (abs($this->getRow() - $row) == 1 && abs($this->getCol() - $col) == 1) {
            parent::move($row, $col);
        } else if (abs($this->getRow() - $row) == 1 && abs($this->getCol() - $col) == 0) {
            parent::move($row, $col);
        } else if (abs($this->getRow() - $row) == 0 && abs($this->getCol() - $col) == 1) {
            parent::move($row, $col);
        } else {
            throw new Exception("Invalid move.");
        }
    }
}