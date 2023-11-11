function startGame() {
    $.ajax({
        url: 'helpers/start_game.php', // Adjust the path based on your file structure
        type: 'POST',
        success: function(response) {
            // Assuming the response is a JSON representation of the new board state
            const pieces = JSON.parse(response);

            // Clear the current board
            document.getElementById('chessboard').innerHTML = '';

            // Display the new board state
            pieces.forEach(piece => {
                const img = document.createElement('img');
                img.src = piece.getIcon();
                img.alt = ''; // Add appropriate alt text
                document.getElementById('chessboard').appendChild(img);
            });
        },
        error: function(error) {
            console.error('Error starting the game:', error);
        }
    });
}
