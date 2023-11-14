// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
    console.log('Script loaded.');

    // Select the board
    const board = document.querySelector('#chessboard-container');
    const startButton = document.querySelector('#start-button');
    const currentPlayerDisplay = document.querySelector('#current-player');

    // Add a click event listener to the board
    board.addEventListener('click', event => {
        // Find the closest square to the event target
        const square = event.target.closest('[data-row][data-col]');

        if (square) {
            // Get the row and column of the clicked square
            const row = square.getAttribute('data-row');
            const col = square.getAttribute('data-col');
            const piece = square.getAttribute('data-piece');

            // Log the row, column, and piece to the console
            console.log(`Clicked square at row ${row}, column ${col}, piece ${piece}`);
        }
    });

    // Add a click event listener to the start button
    startButton.addEventListener('click', () => {
        fetch('PlayerController.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                action: 'endTurn'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                currentPlayerDisplay.textContent = `${data.currentPlayer}'s turn`;
            } else {
                alert(data.error);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });
});

const endTurnButton = document.querySelector('#end-turn-button');

endTurnButton.addEventListener('click', () => {
    fetch('PlayerController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            action: 'endTurn'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            currentPlayerDisplay.textContent = `${data.currentPlayer}'s turn`;
        } else {
            alert(data.error);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});