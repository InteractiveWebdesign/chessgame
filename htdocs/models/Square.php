<?php

// Square.php
class Square
{
    private $xPosition; // A-H
    private $yPosition; // 1-8
    private $piece; // Piece object

    public function __construct($xPosition, $yPosition)
    {
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
        $this->piece = null;
    }

    public function getXPosition()
    {
        return $this->xPosition;
    }

    public function getYPosition()
    {
        return $this->yPosition;
    }

    public function getPiece()
    {
        return $this->piece;
    }

    public function setPiece(Piece $piece)
    {
        $this->piece = $piece;
    }

    public function getPosition()
    {
        return $this->xPosition . $this->yPosition;
    }
}
