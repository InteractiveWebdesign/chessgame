<?php

class Piece {
    private $color;
    private $row;
    private $col;
    private $name;
    
    public function __construct($color, $row, $col, $name) {
        $this->color = $color;
        $this->row = $row;
        $this->col = $col;
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
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

    public function getIcon() {
        $colorPrefix = $this->color === 'white' ? 'White' : 'Black';
        $pieceType = ucfirst(strtolower(get_class($this)));

        // Assuming the images are stored in htdocs/images
        $iconPath = "/images/{$colorPrefix}{$pieceType}.svg"; // Updated path

        return $iconPath;
    }
}