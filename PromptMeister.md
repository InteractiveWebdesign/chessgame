# Prompts

I have start building a chess game. I now have a board and want to start working on positions and on the logging from pawn names and there positions in the UI. I can give all the files you want I will start with the structure of my project that is based on this and I use PHP and OOP as much as possible. 


## project structure
# Create project folder file structure with this command:
Get-ChildItem -Recurse C:\localbox\data\www\chessgame | Where-Object { $_.FullName -notmatch '\\\.git\\' } | Format-Table FullName

 ## You will get something like:

C:\localbox\data\www\chessgame\.devcontainer
C:\localbox\data\www\chessgame\.git
C:\localbox\data\www\chessgame\htdocs
C:\localbox\data\www\chessgame\PromptMeister.md
C:\localbox\data\www\chessgame\README.md
C:\localbox\data\www\chessgame\.devcontainer\devcontainer.json
C:\localbox\data\www\chessgame\htdocs\controllers
C:\localbox\data\www\chessgame\htdocs\images
C:\localbox\data\www\chessgame\htdocs\models
C:\localbox\data\www\chessgame\htdocs\views
C:\localbox\data\www\chessgame\htdocs\index.php
C:\localbox\data\www\chessgame\htdocs\SessionManager.php
C:\localbox\data\www\chessgame\htdocs\controllers\GameController.php
C:\localbox\data\www\chessgame\htdocs\controllers\PlayerController.php
C:\localbox\data\www\chessgame\htdocs\images\BlackBishop.svg
C:\localbox\data\www\chessgame\htdocs\images\BlackKing.svg
C:\localbox\data\www\chessgame\htdocs\images\Blackknight.svg
C:\localbox\data\www\chessgame\htdocs\images\BlackPawn.svg
C:\localbox\data\www\chessgame\htdocs\images\BlackQueen.svg
C:\localbox\data\www\chessgame\htdocs\images\BlackRook.svg
C:\localbox\data\www\chessgame\htdocs\images\WhiteBishop.svg
C:\localbox\data\www\chessgame\htdocs\images\WhiteKing.svg
C:\localbox\data\www\chessgame\htdocs\images\WhiteKnight.svg
C:\localbox\data\www\chessgame\htdocs\images\WhitePawn.svg
C:\localbox\data\www\chessgame\htdocs\images\WhiteQueen.svg
C:\localbox\data\www\chessgame\htdocs\images\WhiteRook.svg
C:\localbox\data\www\chessgame\htdocs\models\Bishop.php
C:\localbox\data\www\chessgame\htdocs\models\Chessboard.php
C:\localbox\data\www\chessgame\htdocs\models\King.php
C:\localbox\data\www\chessgame\htdocs\models\Knight.php
C:\localbox\data\www\chessgame\htdocs\models\Pawn.php
C:\localbox\data\www\chessgame\htdocs\models\Piece.php
C:\localbox\data\www\chessgame\htdocs\models\Queen.php
C:\localbox\data\www\chessgame\htdocs\models\Rook.php
C:\localbox\data\www\chessgame\htdocs\views\chessboard.php