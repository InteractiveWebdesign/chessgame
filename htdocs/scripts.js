document.addEventListener('DOMContentLoaded', function () {
    console.log('Script loaded.'); // Log that the script is loaded

    let selectedSquare = null; // Add this line to keep track of the selected square

    // Function to handle square clicks
    function handleSquareClick(row, col) {
        // If a square has been selected, this is the second click (the move to)
        if (selectedSquare) {
            // Construct the URL with the move information
            const url = `helpers/movement.php?currentRow=${selectedSquare.row}&currentCol=${selectedSquare.col}&newRow=${row}&newCol=${col}`;
            console.log('Request URL:', url); // Add this line for debugging

            // Open and send the request
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Update the frontend based on the server's response
                        const response = JSON.parse(xhr.responseText);
                        console.log('Server response:', response); // Add this line for debugging
                        updateFrontend(response);
                    } else {
                        // Handle error
                        console.error('Error:', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.open('GET', url, true);
            xhr.send();

            // Clear the selected square
            selectedSquare = null;
        } else {
            // If no square has been selected, this is the first click (the move from)
            selectedSquare = { row: row, col: col };
        }
    }

    // Function to update the frontend based on the server's response
    function updateFrontend(response) {
        console.log('Updating frontend with response:', response); // Add this line for debugging

        // Clear the chessboard container
        const chessboardContainer = document.getElementById('chessboard-container');
        chessboardContainer.innerHTML = '';

        // Get the squares array from the server's response
        const serverSquares = response.gameState.squares;

        // Iterate through the squares and update the chessboard display
        for (const col in serverSquares) {
            for (const row in serverSquares[col]) {
                const square = serverSquares[col][row];
                const piece = square.piece;

                // Create a div for the square
                const squareDiv = document.createElement('div');
                squareDiv.classList.add('chessboard-square');
                squareDiv.dataset.row = square.getYPosition(); // Adjusted to use getYPosition
                squareDiv.dataset.col = square.getXPosition(); // Adjusted to use getXPosition

                // Set background color based on square position
                const color = ((square.getXPosition().charCodeAt(0) - 'A'.charCodeAt(0) + parseInt(square.getYPosition())) % 2 === 0) ? 'bg-gray-200' : 'bg-gray-400';
                squareDiv.classList.add(color);

                // Append the square to the chessboard container
                chessboardContainer.appendChild(squareDiv);

                // If there is a piece, create an img element for it
                if (piece) {
                    const img = document.createElement('img');
                    img.src = piece.icon; // Assuming your piece object has an 'icon' property
                    img.alt = piece.name; // Add appropriate alt text
                    squareDiv.appendChild(img);
                }
            }
        }

        // Attach click event listeners to all chessboard squares
        const squares = document.querySelectorAll('.chessboard-square');
        console.log('Number of squares:', squares.length); // Log the number of squares
        squares.forEach(square => {
            square.addEventListener('click', function () {
                // Extract row and column information from the square's data attributes
                const row = square.dataset.row;
                const col = square.dataset.col;

                // Call the function to handle the click
                handleSquareClick(row, col);
            });
        });
    }
});