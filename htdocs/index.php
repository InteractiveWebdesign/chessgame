<?php
// Start the session
session_start();

// Game related classes
require_once 'models/Chessboard.php';
require_once 'models/Piece.php';
require_once 'models/Pawn.php';
require_once 'models/Rook.php';
require_once 'models/Knight.php';
require_once 'models/Bishop.php';
require_once 'models/Queen.php';
require_once 'models/King.php';
// Utility classes
require_once 'SessionManager.php';
// Helper functions
require_once 'helpers/start_game.php';

// Check if the form is submitted for Player One
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitPlayerOneName'])) {
    // Update the player one name in the session
    $_SESSION['playerOneName'] = $_POST['playerOneName'];
}

// Check if the form is submitted for Player Two
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitPlayerTwoName'])) {
    // Update the player two name in the session
    $_SESSION['playerTwoName'] = $_POST['playerTwoName'];
}

// Debugging: Print session information
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Chessboard</title>
</head>
<body class="flex flex-row justify-center h-screen bg-gray-100">

<!-- Player One Column -->
<div class="flex flex-col items-center justify-center w-1/5 p-4">
    <h2 class="text-lg font-bold mb-2"><?php echo isset($_SESSION['playerOneName']) ? $_SESSION['playerOneName'] : 'Player One'; ?></h2>
    <form method="post" action="">
        <input type="text" name="playerOneName" id="playerOneName" class="mb-2 p-2 border rounded" placeholder="Enter name" value="<?php echo isset($_SESSION['playerOneName']) ? $_SESSION['playerOneName'] : ''; ?>">
        <button type="submit" name="submitPlayerOneName" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
    <!-- Additional content for player one if needed -->
</div>

<!-- Chessboard and Moves Column -->
<div class="flex flex-col items-center justify-center w-3/5 p-4">
    <h1 class="text-xl font-bold my-12">Chessboard</h1>
    <div id="chessboard" class="chessboard">
        <!-- Use the displayEmptyBoard method instead of displayBoard -->
        <?php
        $chessboard = new Chessboard();
        echo '<div id="chessboard" class="chessboard">';
        $chessboard->displayEmptyBoard(false); // Pass false to get HTML as a string
        echo '</div>';
        ?>
    </div>
    <button id="startButton" class="bg-green-500 text-white px-4 py-2 rounded mt-4" onclick="startGame()">Start Game</button>

    <!-- Move Log -->
    <div id="moveLog" class="bg-black text-white flex flex-col items-center justify-center w-full p-4 rounded-t-lg">
        <!-- Move log entries will be dynamically added here -->
        <?php
        // Fake commentary about moves (replace with actual move log)
        $moveLogEntries = [
            'Player One moved Pawn to E4',
            'Player Two moved Knight to C6',
            'Player One moved Bishop to G5',
            // ... add more entries as needed
        ];

        foreach ($moveLogEntries as $entry) {
            echo "<p>$entry</p>";
        }
        ?>
    </div>
</div>

<!-- Player Two Column -->
<div class="flex flex-col items-center justify-center w-1/5 p-4">
    <h2 class="text-lg font-bold mb-2"><?php echo isset($_SESSION['playerTwoName']) ? $_SESSION['playerTwoName'] : 'Player Two'; ?></h2>
    <form method="post" action="">
        <input type="text" name="playerTwoName" id="playerTwoName" class="mb-2 p-2 border rounded" placeholder="Enter name" value="<?php echo isset($_SESSION['playerTwoName']) ? $_SESSION['playerTwoName'] : ''; ?>">
        <button type="submit" name="submitPlayerTwoName" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
    <!-- Additional content for player two if needed -->
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="scripts.js"></script>
</body>
</html>
