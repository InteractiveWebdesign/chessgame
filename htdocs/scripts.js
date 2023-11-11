// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
    console.log('Script loaded.');

    // Select the board
    const board = document.querySelector('#chessboard-container');

    // Add a click event listener to the board
    board.addEventListener('click', event => {
        // Find the closest square to the event target
        const square = event.target.closest('[data-row][data-col]');

        if (square) {
            // Get the row and column of the clicked square
            const row = square.getAttribute('data-row');
            const col = square.getAttribute('data-col');

            // Log the row and column to the console
            console.log(`Clicked square at row ${row}, column ${col}`);
        }
    });
});