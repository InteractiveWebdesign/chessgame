<?php
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

// Start the session
session_start();

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
        <div id="chessboard" class="chessboard"><!-- Chessboard squares will be dynamically generated here --></div>
        <button id="startButton" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Start Game</button>

    <?php
    // Initialize the board
    $chessboard = new Chessboard();
    $chessboard->displayBoard();
    ?>

    <!-- Move Log -->
    <div id="moveLog" class="bg-black text-white flex flex-col items-center justify-center w-full p-4 rounded-t-lg">
    <!-- <div id="moveLog" class="bg-black text-white flex flex-col items-center justify-center w-2/3 p-4"> -->
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

<script>
    // Assuming the pieces are represented by Piece objects
    // You might want to replace this part with your actual logic for placing and displaying pieces
    const pieces = <?php echo json_encode($chessboard->getPieces()); ?>;

    // Assuming each piece has a getIcon method
    pieces.forEach(piece => {
        const img = document.createElement('img');
        img.src = piece.getIcon();
        img.alt = ''; // Add appropriate alt text
        document.getElementById('chessboard').appendChild(img);
    });
</script>

<script src="scripts.js"></script>
</body>
</html>
