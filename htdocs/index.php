<?php
// Start the session
session_start();

//  need to autoload later

// Game relared Controllers
require_once 'controllers/PlayerController.php';
require_once 'controllers/GameController.php';

// Models
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

// Create PlayerController instances
$playerOneController = new PlayerController($_SESSION['playerOneName'] ?? 'Player One');
$playerTwoController = new PlayerController($_SESSION['playerTwoName'] ?? 'Player Two');

// Create a GameController instance
$gameController = new GameController([$playerOneController, $playerTwoController]);

// Debugging: Print session information
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<!-- Header -->
<?php require_once 'views/header.php'; ?>

<!-- Main Content -->
<div class="flex flex-row justify-center min-h-screen">



    <!-- Player One Column -->
    <div class="flex flex-col items-center justify-center w-1/5 ml-2">
        <div class="max-w-screen-sm w-full">
            <h2 class="text-lg font-bold mb-2">
                <?php echo isset($_SESSION['playerOneName']) ? $_SESSION['playerOneName'] : 'Player One'; ?>
            </h2>
            <form method="post" action="" class="flex items-stretch justify-between w-full">
                <input type="text" name="playerOneName" id="playerOneName" class="w-3/4 p-2 border rounded" placeholder="Enter name" value="<?php echo isset($_SESSION['playerOneName']) ? $_SESSION['playerOneName'] : ''; ?>">
                <button type="submit" name="submitPlayerOneName" class="w-1/4 bg-blue-500 text-white text-center p-2 rounded">Save</button>
            </form>
            <!-- Additional content for player one if needed -->
            <?php $chessboard->displayPiecePositionsByPlayer('white'); ?>
        </div>
    </div>
    <!-- Chessboard and Moves Column -->

    <div class="flex flex-col items-center w-4/5 p-4">
    <div id="moveLog" class="bg-blue-800 text-white flex flex-col items-center justify-center w-full p-4 rounded-t-lg">
        <p id="current-player" class="text-lg text-red-500"></p>
            <?php
            
            $currentPlayerController = $gameController->getCurrentPlayerController();
            if ($currentPlayerController->isTurn()) {
                echo $currentPlayerController->getName() . "'s turn";
            } 


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
        <div id="chessboard-container" class="w-full mx-auto">
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

    <!-- Player Two Column --->
    <div class="flex flex-col items-center justify-center w-1/5 ml-2 mr-2">
        <div class="max-w-screen-sm w-full">
            <h2 class="text-lg font-bold mb-2">
                <?php echo isset($_SESSION['playerTwoName']) ? $_SESSION['playerTwoName'] : 'Player Two'; ?>
            </h2>
            <form method="post" action="" class="flex items-stretch justify-between w-full">
                <input type="text" name="playerTwoName" id="playerTwoName" class="w-3/4 p-2 border rounded" placeholder="Enter name" value="<?php echo isset($_SESSION['playerTwoName']) ? $_SESSION['playerTwoName'] : ''; ?>">
                <button type="submit" name="submitPlayerTwoName" class="w-1/4 bg-blue-500 text-white text-center p-2 rounded">Save</button>
            </form>
            <!-- Additional content for player two if needed -->
            <?php $chessboard->displayPiecePositionsByPlayer('black'); ?>
        </div>
    </div>
</div>
<script src="scripts.js"></script>
</body>
</html>
