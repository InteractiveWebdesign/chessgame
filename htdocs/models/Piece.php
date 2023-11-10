<?php

class Piece {
    private $color;
    private $row;
    private $col;
    
    public function __construct($color, $row, $col) {
        $this->color = $color;
        $this->row = $row;
        $this->col = $col;
    }

    public function getColor() {
        return $this->color;
    }

    public function getRow() {
        return $this->row;
    }

    public function getCol() {
        return $this->col;
    }

    public function move($row, $col) {
        $this->row = $row;
        $this->col = $col;
    }
}