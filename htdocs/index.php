<?php
// Start the session
session_start();

// Game relared classes
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

// Components from /view
require_once 'views/header.php';

// Create an instance of the Chessboard class
$chessboard = new Chessboard();

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
<body class="mt-48 flex flex-row justify-center h-screen bg-gray-100">

<!-- Player One Column -->
<div class="mt-24 flex flex-col items-center justify-center w-1/5 p-4">
    <h2 class="text-lg font-bold mb-2"><?php echo isset($_SESSION['playerOneName']) ? $_SESSION['playerOneName'] : 'Player One'; ?></h2>
    <form method="post" action="">
        <input type="text" name="playerOneName" id="playerOneName" class="mb-2 p-2 border rounded" placeholder="Enter name" value="<?php echo isset($_SESSION['playerOneName']) ? $_SESSION['playerOneName'] : ''; ?>">
        <button type="submit" name="submitPlayerOneName" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
    <!-- Additional content for player one if needed -->
    <?php 
    // Display piece positions for Player One
    $chessboard->displayPiecePositionsByPlayer('white');
    ?>
</div>




<!-- Chessboard and Moves Column -->
<div class="flex flex-col items-center justify-center w-4/5 p-4">
    <div id="moveLog" class="bg-blue-800 text-white flex flex-col items-center justify-center w-full p-4 rounded-t-lg">
        <?php
        // Fake commentary about moves (replace with actual move log)
        $moveLogEntries = [
            'I want game control here, who turn is it?',
            // ... add more entries as needed
        ];

        foreach ($moveLogEntries as $entry) {
            echo "<p>$entry</p>";
        }
        ?>
    </div>

     <!-- Chessboard Container -->
     <div id="chessboard-container" class="mt-12 w-full mx-auto">
        <?php
        // Display the chessboard
        $chessboard->displayBoard();
        ?>
    </div>

    <!-- Move Log -->
    <div id="moveLog" class="bg-black text-white flex flex-col items-center justify-center w-full p-4 rounded-b-lg">
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
<div class="mt-24 flex flex-col items-center justify-center w-1/5 p-4">
    <h2 class="text-lg font-bold mb-2"><?php echo isset($_SESSION['playerTwoName']) ? $_SESSION['playerTwoName'] : 'Player Two'; ?></h2>
    <form method="post" action="">
        <input type="text" name="playerTwoName" id="playerTwoName" class="mb-2 p-2 border rounded" placeholder="Enter name" value="<?php echo isset($_SESSION['playerTwoName']) ? $_SESSION['playerTwoName'] : ''; ?>">
        <button type="submit" name="submitPlayerTwoName" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
    <!-- Additional content for player two if needed -->
    <?php 
    // Display piece positions for Player Two
    $chessboard->displayPiecePositionsByPlayer('black');
    ?>
</div>

<!-- <script>
    // You might want to replace this part with your actual logic for placing and displaying pieces
    const pieces = <?php //echo json_encode($chessboard->getPieces()); ?>;

    // Assuming each piece has a getIcon method
    pieces.forEach(piece => {
        const img = document.createElement('img');
        img.src = piece.getIcon();
        img.alt = ''; // Add appropriate alt text
        document.getElementById('chessboard').appendChild(img);
    });
</script> -->

<script src="scripts.js"></script>
</body>
</html>
