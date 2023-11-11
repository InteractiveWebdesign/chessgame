// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Log that the script is loaded
    console.log('Script loaded.');

    // Select all squares on the board
    const squares = document.querySelectorAll('[data-row][data-col]');

    // Iterate over each square
    squares.forEach(square => {
        // Add a click event listener to each square
        square.addEventListener('click', event => {
            // Get the row and column of the clicked square
            const row = event.target.getAttribute('data-row');
            const col = event.target.getAttribute('data-col');

            // Log the row and column to the console
            console.log(`Clicked square at row ${row}, column ${col}`);
        });
    });
});