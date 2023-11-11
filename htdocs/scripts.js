document.addEventListener('DOMContentLoaded', function () {
    // Function to handle square clicks
    function handleSquareClick(row, col) {
        // Send an asynchronous request to the server
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Update the frontend based on the server's response
                    const response = JSON.parse(xhr.responseText);
                    updateFrontend(response);
                } else {
                    // Handle error
                    console.error('Error:', xhr.status, xhr.statusText);
                }
            }
        };

        // Construct the URL with the move information
        const url = `helpers/movement.php?row=${row}&col=${col}`;

        // Open and send the request
        xhr.open('GET', url, true);
        xhr.send();
    }

    // Function to update the frontend based on the server's response
    function updateFrontend(response) {
        // Clear the chessboard container
        const chessboardContainer = document.getElementById('chessboard-container');
        chessboardContainer.innerHTML = '';

        // Get the squares array from the server's response
        const squares = response.gameState.squares;

        // Iterate through the squares and update the chessboard display
        for (const col in squares) {
            for (const row in squares[col]) {
                const square = squares[col][row];
                const piece = square.piece;

                // Create a div for the square
                const squareDiv = document.createElement('div');
                squareDiv.classList.add('chessboard-square');
                squareDiv.dataset.row = row;
                squareDiv.dataset.col = col;

                // Set background color based on square position
                const color = ((col.charCodeAt(0) - 'A'.charCodeAt(0) + parseInt(row)) % 2 === 0) ? 'bg-gray-200' : 'bg-gray-400';
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
    }

    // Attach click event listeners to all chessboard squares
    const squares = document.querySelectorAll('.chessboard-square');
    squares.forEach(square => {
        square.addEventListener('click', function () {
            // Extract row and column information from the square's data attributes
            const row = parseInt(square.dataset.row, 10);
            const col = square.dataset.col;

            // Call the function to handle the click
            handleSquareClick(row, col);
        });
    });
});
