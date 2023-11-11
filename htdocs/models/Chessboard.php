<?php

// Include the Position class
require_once 'Position.php';

class Chessboard {
    private $positions;

    public function __construct() {
        // Initialize the board with empty positions
        $this->initEmptyBoard();

        // Add pieces to the initial positions on the board
        $this->addStartingPieces();
    }

    public function getPositions() {
        return $this->positions;
    }

    public function displayEmptyBoard($echo = true) {
        // Use output buffering to capture the HTML
        ob_start();
        
        // Display the current state of the chessboard with Tailwind CSS styling
        echo '<div class="flex justify-center items-center p-3">';
        echo '<div class="bg-gray-100 rounded-md">';
        echo '<table class="table-auto border-collapse w-full">';
        for ($row = 1; $row <= 8; $row++) {
            echo '<tr>';
            for ($col = 'A'; $col <= 'H'; $col++) {
                $color = ($row + ord($col)) % 2 == 0 ? 'bg-gray-200' : 'bg-gray-400';
                echo '<td class="w-10 h-10 ' . $color . '">';
                $piece = $this->positions[$row][$col]->getPiece();
                if ($piece) {
                    echo '<img src="' . $piece->getIcon() . '" alt="" class="w-full h-full">';
                }
                echo '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
        echo '</div>';
    
        // Get the HTML from the output buffer
        $html = ob_get_clean();
    
        // Either echo the HTML or return it as a string based on the parameter
        if ($echo) {
            echo $html;
        } else {
            return $html;
        }
    }
    

    private function initEmptyBoard() {
        // Initialize the board with empty positions
        $this->positions = [];
        for ($row = 1; $row <= 8; $row++) {
            for ($col = 'A'; $col <= 'H'; $col++) {
                $this->positions[$row][$col] = new Position($row, $col);
            }
        }
    }

    private function addStartingPieces() {
        // Add pieces to the initial positions on the board for white
        $this->positions[1]['A']->occupy(new Rook('white'));
        $this->positions[1]['B']->occupy(new Knight('white'));
        $this->positions[1]['C']->occupy(new Bishop('white'));
        $this->positions[1]['D']->occupy(new Queen('white'));
        $this->positions[1]['E']->occupy(new King('white'));
        $this->positions[1]['F']->occupy(new Bishop('white'));
        $this->positions[1]['G']->occupy(new Knight('white'));
        $this->positions[1]['H']->occupy(new Rook('white'));

        for ($col = 'A'; $col <= 'H'; $col++) {
            $this->positions[2][$col]->occupy(new Pawn('white'));
        }

        // Add pieces to the initial positions on the board for black
        $this->positions[8]['A']->occupy(new Rook('black'));
        $this->positions[8]['B']->occupy(new Knight('black'));
        $this->positions[8]['C']->occupy(new Bishop('black'));
        $this->positions[8]['D']->occupy(new Queen('black'));
        $this->positions[8]['E']->occupy(new King('black'));
        $this->positions[8]['F']->occupy(new Bishop('black'));
        $this->positions[8]['G']->occupy(new Knight('black'));
        $this->positions[8]['H']->occupy(new Rook('black'));

        for ($col = 'A'; $col <= 'H'; $col++) {
            $this->positions[7][$col]->occupy(new Pawn('black'));
        }
    }

    public function startGame() {
        // Execute the game logic (this is just a simple example, modify as needed)
        $this->initEmptyBoard();
        $this->addStartingPieces();
    
        // Return the updated board state as JSON
        return json_encode($this->getPositions());
    }

    // Additional methods to handle piece movements and interactions on the board
}
