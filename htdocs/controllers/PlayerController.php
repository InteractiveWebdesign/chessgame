<?php

# This is the controller for the Player model; it will keep track of the player's information and update the database accordingly
# It also has a turn function that will be called when the player's turn is up

class PlayerController {
    private $name;
    private $isTurn;

    public function __construct($name) {
        $this->name = $name;
        $this->isTurn = false; // by default, it's not this player's turn
    }

    public function getName() {
        return $this->name;
    }

    public function isTurn() {
        return $this->isTurn;
    }

    public function startTurn() {
        $this->isTurn = true;
    }

    public function endTurn() {
        $this->isTurn = false;
    }
}

// class PlayerController {
//     private $player;
//     private $playerView;
//     private $playerModel;

//     public function __construct($player, $playerView, $playerModel) {
//         $this->player = $player;
//         $this->playerView = $playerView;
//         $this->playerModel = $playerModel;
//     }

//     // public function updatePlayer($player) {
//     //     $this->player = $player;
//     //     $this->playerModel->updatePlayer($player);
//     // }
    
//     public function updatePlayerName($newName) {
//         $this->player->setName($newName);
//         $this->playerModel->updatePlayer($this->player);
//     }

//     public function getPlayer() {
//         return $this->player;
//     }

//     public function getPlayerView() {
//         return $this->playerView;
//     }

//     public function getPlayerModel() {
//         return $this->playerModel;
//     }

//     public function turn() {
//         global $gameController; // Assuming the GameController is globally accessible
    
//         // Check if it's this player's turn
//         if ($gameController->getCurrentPlayer() === $this->player) {
//             $gameController->nextTurn();
    
//             // Send a JSON response to the front-end
//             header('Content-Type: application/json');
//             echo json_encode(['success' => true, 'currentPlayer' => $gameController->getCurrentPlayer()->getName()]);
//             exit;
//         } else {
//             header('Content-Type: application/json');
//             echo json_encode(['success' => false, 'error' => 'Not this player\'s turn']);
//             exit;
//         }
//     }
// }