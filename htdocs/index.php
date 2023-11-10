<?php
// index.php
require_once 'models/Chessboard.php';
require_once 'models/Piece.php';
require_once 'models/Pawn.php';
// ... include other classes ...
?>

<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>Chessboard</title>
    </head>
    <body>

        <h1 class="text-xl bold text-center pt-12 mt-12">Chessboard</h1>

        <div id="chessboard" class="chessboard">
            <!-- Chessboard squares will be dynamically generated here -->
        </div>
        <button id="startButton">Start Game</button>

        <?php
        // Initialize the board
        $chessboard = new Chessboard();
        $chessboard->displayBoard();
        ?>

        <script src="scripts.js"></script>
    </body>
</html>
