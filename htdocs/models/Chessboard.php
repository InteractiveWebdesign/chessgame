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
            // ... Add other pieces as needed
            'A7' => new Pawn('black'),
            'B7' => new Pawn('black'),
            // ... Add other pieces as needed
        ];

        $key = $xPosition . $yPosition;

        return $initialPieces[$key] ?? null;
    }

    public function setSquare($xPosition, $yPosition, Square $square)
    {
        $this->squares[$xPosition][$yPosition] = $square;
    }

    public function displayBoard()
    {
        echo '<div class="flex justify-center items-center p-3">';
        echo '<div class="bg-gray-100 rounded-md">';
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

        echo '<td class="w-10 h-10 ' . $color . '">';

        $piece = $this->getPieceAtSquare($square);
        if ($piece) {
            echo '<img src="' . $piece->getIcon() . '" alt="" class="w-full h-full">';
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
}

?>
