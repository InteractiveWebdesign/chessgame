## Chess Game with PHP MVC Model on OOP Principles

<h1 align="center">Chess Board</h1>

### Overview

This project implements a chess game using PHP following the MVC (Model-View-Controller) architecture with Object-Oriented Programming (OOP) principles.

### Board Representation

The chessboard is represented as an 8x8 array of squares, where each square is an object with a color and a piece. The piece is also an object with a color and a type. The available piece types are pawn, knight, bishop, rook, queen, and king.

### Board Setup Rules

1. **Correct Board Layout:**
   - The board should be set up with the white square in the nearest row on the right, following the "white on the right" principle.
   - The white queen will always be on a white square, and the black queen will always be on a black square.

2. **Rook Placement:**
   - The rook always goes in the corner, and the queen is placed on her own color.
   - Mixing this up will result in the king and queen being misplaced.

3. **Bishops and Knights:**
   - Bishops are placed next to the knights.
   - Incorrect placement can lead to the king and queen being mixed up.

4. **Queen Placement:**
   - The queen goes on her own color.

5. **King Placement:**
   - The king always goes on the remaining square.

6. **Pawn Placement:**
   - Pawns are placed on the second row.

### Additional Setup Notes

7. **White Queen Position:**
   - The white queen is always on a white square.

8. **Black Queen Position:**
   - The black queen is always on a black square.

### Rules of Chess (Additional Notes)

- It's essential to follow these setup rules to ensure proper gameplay and avoid confusion between the king and queen positions.

### Contributors

- [Your Name]
- [Contributor 1]
- [Contributor 2]

### How to Use

[Provide instructions on how to use or set up the chess game in this section.]

### License

[Include information about the project's license, if applicable.]

Feel free to contribute, report issues, or suggest improvements!