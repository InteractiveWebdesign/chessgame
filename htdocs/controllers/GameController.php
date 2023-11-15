<?php

/* 
This class will manage the flow of the game
So it will handle turns, validating moves, and updating the game state.
*/

class GameController {
    private $players;
    private $currentPlayerIndex;
    private $gameState;

    public function __construct(array $players) {
        $this->players = $players;
        $this->currentPlayerIndex = 0; // Set the initial player
        $this->gameState = new ChessBoard(); // Assuming ChessBoard is your game state class
    }

    // public function __construct() {
    //     // Initialize game state and set the starting player
    //     $this->gameState = new ChessBoard(); // Assuming ChessBoard is your game state class
    //     $this->currentPlayer = new Player('Player1', 'white');
    // }

    public function getCurrentPlayerController() {
        return $this->players[$this->currentPlayerIndex];
    }

    public function makeMove($from, $to) {
        // Validate the move
        if ($this->isValidMove($from, $to)) {
            // Update the game state
            $this->gameState->makeMove($from, $to);

            // Switch to the next player's turn
            $this->switchPlayer();
        }
    }

    public function getCurrentPlayer() {
        return $this->players[$this->currentPlayerIndex];
    }

    public function getGameState() {
        return $this->gameState;
    }

    private function isValidMove($from, $to) {
        // Implement move validation logic
        // Check if the move is valid for the current player
        // Check if the move is valid on the current board state
        // ...

        return true; // Return true for now, replace with actual logic
    }

    private function switchPlayer() {
        // Switch to the next player's turn
        $this->currentPlayerIndex = ($this->currentPlayerIndex + 1) % count($this->players);
    }
}