# tictactoe
TIC TAC TOE as a service 

## Requirements

* PHP 7.1.3 or higher;

## Installation

```
git clone https://github.com/hdpsilva/tictactoe.git
cd tictactoe/
composer install
```

## Usage

```
cd tictactoe/
```

##### Create users 
```
php console/createUser.php John
```

##### Delete users 
```
php console/deleteUser.php John
```

##### Start a new game between two users (Default board dimension 3x3)
```
php console/startGame.php playerA playerB gameName dimension
```

##### A user doing a move in a game
```
php console/cellMark.php positionX positioY token
```

##### To know if a game has finished and if there is a winner
```
php console/checkWinning.php token 
```


## Tests with PHPUnit Testing Framework

```
cd tictactoe/
```

##### Run all tests
```
php bin/phpunit 
```
