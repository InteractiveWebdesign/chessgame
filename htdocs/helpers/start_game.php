<?php
// Enable error reporting
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Define the path to your custom log file
$logFilePath = __DIR__ . '/logs/error_log.txt';

// Include necessary files and classes using absolute paths
require_once __DIR__ . '/../models/Chessboard.php';

// Function to log errors
function logError($message) {
    global $logFilePath;
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] $message\n";
    error_log($logMessage, 3, $logFilePath);
}

// Create a new Chessboard instance
$chessboard = new Chessboard();

// Execute the game logic (this is just a simple example, you may need to modify it)
try {
    $chessboard->startGame();
} catch (Exception $e) {
    logError("Error during game execution: " . $e->getMessage());
}

// Return the updated board state as JSON

echo json_encode($chessboard->getPositions());
?>
