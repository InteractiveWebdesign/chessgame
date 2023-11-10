<?php
// index.php
require_once 'models/Chessboard.php';
require_once 'models/Piece.php';
require_once 'models/Pawn.php';
require_once 'models/Rook.php';
require_once 'models/Knight.php';
require_once 'models/Bishop.php';
require_once 'models/Queen.php';
require_once 'models/King.php';
// ... include other classes ...
?>

<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Chessboard</title>
</head>
<!-- <body class="flex flex-col items-center justify-center h-screen bg-gray-100 mx-auto max-w-screen-lg"> -->
<body class="flex flex-row justify-center h-screen bg-gray-100">

<!-- Player One Column -->
<div class="flex flex-col items-center justify-center w-1/5 p-4">
    <h2 class="text-lg font-bold mb-2">Player One</h2>
    <input type="text" id="playerOneName" class="mb-2 p-2 border rounded" placeholder="Enter name">
    <!-- Additional content for player one if needed -->
</div>

<!-- Chessboard and Moves Column -->
<div class="flex flex-col items-center justify-center w-3/5 p-4">
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

<!-- Move Log -->
<div id="moveLog" class="mt-4">
        <!-- Move log entries will be dynamically added here -->
    </div>
</div>


<!-- Player Two Column -->
<div class="flex flex-col items-center justify-center w-1/5 p-4">
    <h2 class="text-lg font-bold mb-2">Player Two</h2>
    <input type="text" id="playerTwoName" class="mb-2 p-2 border rounded" placeholder="Enter name">
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
