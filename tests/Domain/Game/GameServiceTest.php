<?php

namespace App\Tests\Domain\Game\Factory;

use App\Domain\Game\Entity\GameBoard;
use App\Domain\Game\Entity\Player;
use App\Domain\Game\GameService;
use App\Domain\Game\Entity\Game;
use App\Domain\User\Entity\User;
use App\Domain\Game\Factory\GameBuilder;

use PHPUnit\Framework\TestCase;

class GameServiceTestTest extends TestCase
{
    public function testStartNewGame()
    {
        $gameBuilder = new GameBuilder();

        $playerA = new User('John Doe');
        $playerB = new User('Jane Doe');
        $gameBoard = new GameBoard(3);

        $gameName = 'Tic Tac Toe';

        $gameService = new GameService($gameBuilder);

        $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);

        self::assertInstanceOf(Game::class, $newGame);
        self::assertInstanceOf(Player::class, $newGame->getPlayerA());
        self::assertInstanceOf(Player::class, $newGame->getPlayerB());
        self::assertInstanceOf(GameBoard::class, $newGame->getGameBoard());
        self::assertEquals($gameName, $newGame->getName());
    }

    /**
     * @dataProvider gameNamesProvider
     * @param string $gameName
     */
    public function testFindGame(string $gameName)
    {
        $gameBuilder = new GameBuilder();
        $gameService = new GameService($gameBuilder);

        $game = $gameService->findGameByName($gameName);

        self::assertEquals($gameName, $game->getName());
    }

    public function gameNamesProvider()
    {
        return [
            ['Tic Tac Toe']
        ];
    }

    public function testMarkCell()
    {
        $gameBoard = new GameBoard(3);

        $gameBoard->markCellWithToken(2, 2, Game::PLAYER_TOKEN_A);

        $this->assertEquals(Game::PLAYER_TOKEN_A, $gameBoard->getPlayerTokenAt(2, 2));
    }

    public function testWinnerWithHorizontalRow()
    {
        $gameBuilder = new GameBuilder();

        $playerA = new User('John Doe');
        $playerB = new User('Jane Doe');
        $gameBoard = new GameBoard(3);

        $gameName = 'Tic Tac Toe';

        $gameService = new GameService($gameBuilder);

        $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);

        $playerTokenWinner = Game::PLAYER_TOKEN_A;

        $newGame->getGameBoard()->markCellWithToken(1, 0, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(1, 1, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(1, 2, $playerTokenWinner);

        $this->assertTrue($gameService->checkIfThereIsAWinner($playerTokenWinner));
    }

    public function testWinnerWithVerticalRow() {
        $gameBuilder = new GameBuilder();

        $playerA = new User('John Doe');
        $playerB = new User('Jane Doe');
        $gameBoard = new GameBoard(3);

        $gameName = 'Tic Tac Toe';

        $gameService = new GameService($gameBuilder);

        $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);

        $playerTokenWinner = Game::PLAYER_TOKEN_A;

        $newGame->getGameBoard()->markCellWithToken(0, 1, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(1, 1, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(2, 1, $playerTokenWinner);


        $this->assertTrue($gameService->checkIfThereIsAWinner($playerTokenWinner));
    }

    public function testWinnerWithDiagonalRow() {
        $gameBuilder = new GameBuilder();

        $playerA = new User('John Doe');
        $playerB = new User('Jane Doe');
        $gameBoard = new GameBoard(3);

        $gameName = 'Tic Tac Toe';

        $gameService = new GameService($gameBuilder);

        $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);

        $playerTokenWinner = Game::PLAYER_TOKEN_A;

        $newGame->getGameBoard()->markCellWithToken(0, 2, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(1, 1, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(2, 0, $playerTokenWinner);


        $this->assertTrue($gameService->checkIfThereIsAWinner($playerTokenWinner));

        $newGame->getGameBoard()->markCellWithToken(0, 0, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(1, 1, $playerTokenWinner);
        $newGame->getGameBoard()->markCellWithToken(2, 2, $playerTokenWinner);

        $this->assertTrue($gameService->checkIfThereIsAWinner($playerTokenWinner));

    }

    public function testNoWinnerRow() {
        $gameBuilder = new GameBuilder();

        $playerA = new User('John Doe');
        $playerB = new User('Jane Doe');
        $gameBoard = new GameBoard(3);

        $gameName = 'Tic Tac Toe';

        $gameService = new GameService($gameBuilder);

        $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);

        $this->assertFalse($gameService->checkIfThereIsAWinner(Game::PLAYER_TOKEN_A));
    }

}
