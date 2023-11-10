
<?php

// index.php
require_once 'models/Chessboard.php';
require_once 'models/Piece.php';
require_once 'models/Pawn.php';
// ... include other classes ...


// Initialize the board
$chessboard = new Chessboard();
$chessboard->displayBoard();
