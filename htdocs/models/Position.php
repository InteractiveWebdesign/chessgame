<?php
// htdocs/models/Position.php

class Position {
    private $row;
    private $col;
    private $piece;

    public function __construct($row, $col) {
        $this->row = $row;
        $this->col = $col;
        $this->piece = null; // Initially, the position is not occupied
    }

    public function getRow() {
        return $this->row;
    }

    public function getCol() {
        return $this->col;
    }

    public function isOccupied() {
        return $this->piece !== null;
    }

    public function getPiece() {
        return $this->piece;
    }

    public function occupy($piece) {
        $this->piece = $piece;
    }

    public function vacate() {
        $this->piece = null;
    }
}
