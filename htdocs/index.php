<?php
// index.php
require_once 'models/Chessboard.php';
require_once 'models/Piece.php';
require_once 'models/Pawn.php';
// ... include other classes ...
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>Chessboard</title>
    </head>
    <body class="flex flex-col items-center justify-center h-screen bg-gray-100">

        <h1 class="text-xl font-bold my-12">Chessboard</h1>

        <div id="chessboard" class="chessboard">
            <!-- Chessboard squares will be dynamically generated here -->
        </div>
        
        <button id="startButton" class="bg-green-500 text-white px-4 py-2 rounded mt-4">Start Game</button>

        <?php
        // Initialize the board
        $chessboard = new Chessboard();
        $chessboard->displayBoard();
        ?>

        <script src="scripts.js"></script>
    </body>
</html>
