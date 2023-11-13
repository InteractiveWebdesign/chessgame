## Chess Game with PHP MVC Model on OOP Principles

<h1 align="center">Chess Board</h1>




### Goals

I want to use the OOP principles Encapsulation, Inheritance and Polymorphism in this project.Also I want to use the MVC model to organize the code in this project.

I will make sure all the components are used by the time I finish my course about this chess game project for beginner and mediore programmers.

- Encapsulation:

Hide Implementation Details: Encapsulation involves bundling the data (attributes) and the methods (functions) that operate on the data into a single unit, i.e., a class. In this project, we will encapsulate the internal details of each chess piece within its respective class, allowing to hide the complexity of the piece's behavior from the rest of the program.

- Inheritance:

Reuse Code: Inheritance allows a class to inherit the properties and methods of another class. In this project, inheritance is used to create a hierarchy of chess piece classes. For example, a Pawn class can inherit from a generic Piece class. This way, you can reuse common functionality from the base class while allowing specific pieces to have their own unique behavior.

Pieces have similiar attributes that can be shared accross all pieces by using inheritance. Sub classes inheritance from the Piece.php class.

- Polymorphism:

One Interface, Many Implementations: Polymorphism allows objects of different classes to be treated as objects of a common base class. In this project, polymorphism is used to create a consistent interface for all chess pieces. For instance, you might define a common method like move in the base Piece class, and each specific piece class (Pawn, Rook, etc.) can implement this method in its own way.

### Steps taken so far

Create MVC model
Create index page
Created the board
Create the classes
Create the icons and load them into the board
Created layout
Created player action commentary with (hard coded demo) messages
Created session handler
Created session based player names
Implemented game logic for the classed

### Todo
Implement session turn based gameplay
Implement commentary for gameplay
Implement movement of pawns
Implement and reinforce the gamerules


### Ideas
Make funny chess qoutes in the UI


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