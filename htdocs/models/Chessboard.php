<?php

require_once 'Square.php';

class Chessboard
{
    private $squares = [];

    public function __construct()
    {
       $this->resetBoard();
    }

    private function initializeSquares()
    {
        $xPositions = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        $yPositions = range(1, 8);

        foreach ($xPositions as $xPosition) {
            foreach ($yPositions as $yPosition) {
                $square = new Square($xPosition, $yPosition);

                // Add the piece to the square based on the initial board setup
                if ($piece = $this->getPieceAtInitialPosition($xPosition, $yPosition)) {
                    $square->setPiece($piece);
                }

                $this->squares[$xPosition][$yPosition] = $square;
            }
        }
    }

    private function getPieceAtInitialPosition($xPosition, $yPosition)
    {
        // Define the initial board setup
        $initialPieces = [
            'A2' => new Pawn('white'),
            'B2' => new Pawn('white'),
            'C2' => new Pawn('white'),
            'D2' => new Pawn('white'),
            'E2' => new Pawn('white'),
            'F2' => new Pawn('white'),
            'G2' => new Pawn('white'),
            'H2' => new Pawn('white'),
            'A1' => new Rook('white'),
            'B1' => new Knight('white'),
            'C1' => new Bishop('white'),
            'D1' => new Queen('white'),
            'E1' => new King('white'),
            'F1' => new Bishop('white'),
            'G1' => new Knight('white'),
            'H1' => new Rook('white'),
            // Black player pieces
            'A7' => new Pawn('black'),
            'B7' => new Pawn('black'),
            'C7' => new Pawn('black'),
            'D7' => new Pawn('black'),
            'E7' => new Pawn('black'),
            'F7' => new Pawn('black'),
            'G7' => new Pawn('black'),
            'H7' => new Pawn('black'),
            'A8' => new Rook('black'),
            'B8' => new Knight('black'),
            'C8' => new Bishop('black'),
            'D8' => new Queen('black'),
            'E8' => new King('black'),
            'F8' => new Bishop('black'),
            'G8' => new Knight('black'),
            'H8' => new Rook('black'),
        ];

        $key = $xPosition . $yPosition;

        return $initialPieces[$key] ?? null;
    }

    public function setSquare($xPosition, $yPosition, Square $square)
    {
        $this->squares[$xPosition][$yPosition] = $square;
    }

    public function displayBoard(){
        echo '<div id="chessboard-container" class="justify-center items-center p-3">';
        echo '<div class="bg-gray-100 rounded-md mr-9">';
        echo '<table class="table-auto border-collapse w-full">';
    
        // Display column labels
        echo '<tr>';
        echo '<td></td>'; // Empty cell in the top-left corner
        for ($col = 'A'; $col <= 'H'; $col++) {
            echo '<td class="w-10 text-center">' . $col . '</td>';
        }
        echo '</tr>';
    
        for ($row = 1; $row <= 8; $row++) {
            echo '<tr>';
    
            // Display row label
            echo '<td class="w-10 text-center">' . $row . '</td>';
    
            for ($col = 'A'; $col <= 'H'; $col++) {
                $square = $this->squares[$col][$row];
                $color = ((ord($col) - ord('A') + $row) % 2 == 0) ? 'bg-gray-200' : 'bg-gray-400';
    
                // Add data-row, data-col, and data-piece attributes to each square
                $piece = $this->getPieceAtSquare($square);
                if ($piece) {
                    echo '<td class="w-10 h-10 ' . $color . '" data-row="' . $row . '" data-col="' . $col . '" data-piece="' . get_class($piece) . '">';
                    echo '<img src="' . $piece->getIcon() . '" alt="" class="w-full h-full">';
                } else {
                    echo '<td class="w-10 h-10 ' . $color . '" data-row="' . $row . '" data-col="' . $col . '">';
                }
    
                echo '</td>';
            }
    
            echo '</tr>';
        }
    
        echo '</table>';
        echo '</div>';
        echo '</div>';
    }


    public function resetBoard()
    {
        $this->initializeSquares();

        for ($i = 1; $i <= 8; $i++) {
            $this->setPieceOnSquare(chr(64 + $i), 2, new Pawn('white'));
            $this->setPieceOnSquare(chr(64 + $i), 7, new Pawn('black'));
        }

        $this->setPieceOnSquare('A', 1, new Rook('white'));
        $this->setPieceOnSquare('B', 1, new Knight('white'));
        $this->setPieceOnSquare('C', 1, new Bishop('white'));
        $this->setPieceOnSquare('D', 1, new Queen('white'));
        $this->setPieceOnSquare('E', 1, new King('white'));
        $this->setPieceOnSquare('F', 1, new Bishop('white'));
        $this->setPieceOnSquare('G', 1, new Knight('white'));
        $this->setPieceOnSquare('H', 1, new Rook('white'));

        $this->setPieceOnSquare('A', 8, new Rook('black'));
        $this->setPieceOnSquare('B', 8, new Knight('black'));
        $this->setPieceOnSquare('C', 8, new Bishop('black'));
        $this->setPieceOnSquare('D', 8, new Queen('black'));
        $this->setPieceOnSquare('E', 8, new King('black'));
        $this->setPieceOnSquare('F', 8, new Bishop('black'));
        $this->setPieceOnSquare('G', 8, new Knight('black'));
        $this->setPieceOnSquare('H', 8, new Rook('black'));
    }

    private function setPieceOnSquare($xPosition, $yPosition, Piece $piece)
    {
        $this->squares[$xPosition][$yPosition]->setPiece($piece);
    }

    private function getPieceAtSquare(Square $square)
    {
        return $square->getPiece();
    }

    // Show the current positions of all pieces on the board in the UI
    public function displayPiecePositionsByPlayer($player)
    {
        echo '<h2 class="text-lg font-bold mb-2">' . ucfirst($player) . ' Player</h2>';
        echo '<table class="table-auto w-full bg-white shadow-lg rounded-lg mb-4">';
        echo '<thead class="bg-blue-500 text-white rounded-lg">';
        echo '<tr>';
        echo '<th class="px-4 py-2 rounded-tl-lg">Piece</th>';
        echo '<th class="px-4 py-2 rounded-tr-lg text-center">Position</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($this->squares as $column => $columns) {
            foreach ($columns as $row => $square) {
                $piece = $square->getPiece();
                if ($piece && $piece->getColor() === $player) {
                    echo '<tr class="hover:bg-gray-200 transition ease-in-out duration-150">';

                    // Add .svg icon before the piece name
                    echo '<td class="px-4 py-2 flex items-center">';
                    echo '<img src="' . $piece->getIcon() . '" alt="" class="w-6 h-6 mr-2">';
                    echo $piece->getName();
                    echo '</td>';

                    // Echo the piece position
                    echo '<td class="px-4 py-2 text-center">' . $column . $row . '</td>';

                    echo '</tr>';
                }
            }
        }

        echo '</tbody>';
        echo '</table>';
    }

    public function isValidMove($startX, $startY, $endX, $endY)
    {
        // Check if the move is within the bounds of the board
        if ($this->isOutOfBounds($startX, $startY) || $this->isOutOfBounds($endX, $endY)) {
            return false;
        }

        // Check if there is a piece at the starting position
        $startSquare = $this->squares[$startX][$startY];
        $piece = $startSquare->getPiece();
        if (!$piece) {
            return false;
        }

        // Differentiate between piece types
        switch ($piece->getType()) {
            case 'Pawn':
                return $this->isValidPawnMove($piece, $startX, $startY, $endX, $endY);
            // Add cases for other piece types (Rook, Knight, Bishop, Queen, King) as needed
            default:
                return false;
        }
    }

    public function makeMove($from, $to) {
        // Implement the logic to make a move on the chessboard
        // This might include updating the state of the squares and handling captures, etc.

        // For demonstration purposes, let's assume you have a method setPieceAtSquare
        // that sets a piece at a specific square
        $piece = $this->getPieceAtSquare($from);
        $this->setPieceAtSquare($to, $piece);
        $this->setPieceAtSquare($from, null);

        // Add any additional logic based on your game rules

        // Example: Check if a piece is captured at the destination square
        $capturedPiece = $this->getPieceAtSquare($to);
        if ($capturedPiece !== null) {
            // Handle the capture, perhaps by removing the captured piece from the game
        }
    }

    private function setPieceAtSquare($square, $piece) {
        // Implement logic to set a piece at a specific square
        // This might involve accessing your squares array or another data structure
        // Update the state of the chessboard
    }

    private function isValidPawnMove($piece, $startX, $startY, $endX, $endY)
    {
        $direction = ($piece->getColor() === 'white') ? -1 : 1;
    
        // Check if it's a valid one-step move forward
        if ($endX == $startX && $endY == $startY + $direction) {
            return true;
        }
    
        // Check if it's a valid two-step move forward (only on the first move)
        if (
            $piece->getMoveCount() === 0
            && $endX == $startX
            && $endY == $startY + 2 * $direction
            && !$this->squares[$startX][$startY + $direction]->getPiece()
        ) {
            return true;
        }
    
        // Check if it's a valid capture move
        if (abs($endX - $startX) == 1 && $endY == $startY + $direction) {
            $endSquare = $this->squares[$endX][$endY];
            $capturedPiece = $endSquare->getPiece();
    
            // Ensure that the destination square is occupied by an enemy piece
            return $capturedPiece && $capturedPiece->getColor() !== $piece->getColor();
        }
    
        return false;
    }

    public function performMove($startX, $startY, $endX, $endY)
    {

        // TODO: Implement the logic to perform the move
        // This will involve updating the internal state of the chessboard
        // For example, move the piece from the start position to the end position
        // You may also need to handle captures, check, and checkmate scenarios

        // Validate the move
        if (!$this->isValidMove($startX, $startY, $endX, $endY)) {
            // Handle invalid move (perhaps throw an exception or log an error)
            return;
        }

        // Get the piece at the starting position
        $startSquare = $this->squares[$startX][$startY];
        $piece = $startSquare->getPiece();

        // Move the piece to the destination position
        $endSquare = $this->squares[$endX][$endY];
        $endSquare->setPiece($piece);

        // Clear the starting position
        $startSquare->setPiece(null);
    }

    public function getGameState()
    {
        $gameState = [];

        foreach ($this->squares as $col => $columns) {
            foreach ($columns as $row => $square) {
                $piece = $square->getPiece();
                $gameState['squares'][$col][$row] = [
                    'piece' => $piece ? [
                        'name' => $piece->getName(),
                        'color' => $piece->getColor(),
                        'icon' => $piece->getIcon(),
                    ] : null,
                ];
            }
        }

        return $gameState;
    }

    private function isOutOfBounds($x, $y)
    {
        return !isset($this->squares[$x][$y]);
    }
}

?>
