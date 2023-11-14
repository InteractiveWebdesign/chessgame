<?php

class GameController {
    private $playerControllers = [];
    private $currentPlayerIndex = 0;

    public function __construct($playerControllers) {
        $this->playerControllers = $playerControllers;
        $this->playerControllers[0]->startTurn(); // it's the first player's turn at the beginning
    }


    public function getCurrentPlayerController() {
        return $this->playerControllers[$this->currentPlayerIndex];
    }

    public function nextTurn() {
        $this->getCurrentPlayerController()->endTurn(); // end the current player's turn
        $this->currentPlayerIndex = ($this->currentPlayerIndex + 1) % count($this->playerControllers);
        $this->getCurrentPlayerController()->startTurn(); // start the next player's turn
    }
}