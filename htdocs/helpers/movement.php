<?php
// htdocs/helpers/movement.php

// Include necessary files and classes
require_once '../models/Chessboard.php';

// Get move information from the query parameters
$currentRow = isset($_GET['currentRow']) ? intval($_GET['currentRow']) : null;
$currentCol = isset($_GET['currentCol']) ? strtoupper($_GET['currentCol']) : null;
$newRow = isset($_GET['newRow']) ? intval($_GET['newRow']) : null;
$newCol = isset($_GET['newCol']) ? strtoupper($_GET['newCol']) : null;

// Initialize the Chessboard
$chessboard = new Chessboard();

// Validate the move
if ($chessboard->isValidMove($currentRow, $currentCol, $newRow, $newCol)) {
    // Perform the move on the chessboard
    $chessboard->performMove($currentRow, $currentCol, $newRow, $newCol);

    // TODO: Check the game state (e.g., checkmate, stalemate)

    // Return the updated game state as a response
    $response = [
        'success' => true,
        'message' => "Move successful: $newCol$newRow",
        'gameState' => $chessboard->getGameState(), // You might want to implement this method
    ];
} else {
    // Invalid move
    $response = [
        'success' => false,
        'message' => 'Invalid move. Please try again.',
    ];
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
