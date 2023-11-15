// alpine.js (for Alpine.js 2.x)
document.addEventListener('DOMContentLoaded', function () {
    console.log('Alpine.js is running!');
    
    Alpine.store('turnController', {
        currentPlayerIndex: 0,
        players: [
            { name: 'Player One', color: 'white' },
            { name: 'Player Two', color: 'black' }
        ],

        switchTurn() {
            this.currentPlayerIndex = (this.currentPlayerIndex + 1) % this.players.length;
        },

        getCurrentPlayer() {
            return this.players[this.currentPlayerIndex];
        }
    });
});
