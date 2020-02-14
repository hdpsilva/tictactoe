<?php

namespace App\Domain\Game;

use App\Domain\Game\Entity\GameBoard;
use App\Domain\Game\Factory\GameBuilder;
use App\Domain\Game\Entity\Game;
use App\Domain\Game\Entity\Player;


class GameService
{
    protected $gameBuilder;

    /**
     * GameService constructor.
     * @param GameBuilder $gameBuilder
     */
    public function __construct(GameBuilder $gameBuilder)
    {
        $this->gameBuilder = $gameBuilder;
    }


    /**
     * @param Player $playerA
     * @param Player $playerB
     * @param string $gameName
     * @param GameBoard $gameBoard
     * @return Game
     */
    public function startNewGame(Player $playerA, Player $playerB, string $gameName, GameBoard $gameBoard): Game
    {
        $this->gameBuilder->addPlayerA($playerA);
        $this->gameBuilder->addPlayerB($playerB);
        $this->gameBuilder->addBoard($gameBoard);
        $this->gameBuilder->setGameName($gameName);
        return $this->gameBuilder->getGame();
    }

    /**
     * @param string $gameName
     * @return Game
     */
    public function findGameByName(string $gameName): Game
    {
        $game = new Game();
        $game->setName($gameName);
        return $game;
    }

    public function checkIfThereIsAWinner(string $playerToken): bool
    {
        return $this->winnerDiagonalMovements($playerToken) ||
            $this->winnerHorizontalOrVerticalMovements($playerToken);
    }



    /**
     * @param string $playerToken
     * @return bool
     */
    public function winnerHorizontalOrVerticalMovements(string $playerToken): bool
    {
        $winner = false;
        $boardDimension = $this->gameBuilder->getGame()->getGameBoard()->boardDimension;
        $board = $this->gameBuilder->getGame()->getGameBoard()->board;
        for ($n = 0; $n < $boardDimension; $n++) {
            $playerTokensInHorizontalRow = 0;
            $playerTokensInVerticalRow = 0;
            for ($m = 0; $m < $boardDimension; $m++) {
                if ($board[$n][$m] === $playerToken) {
                    $playerTokensInHorizontalRow++;
                }
                if ($board[$m][$n] === $playerToken) {
                    $playerTokensInVerticalRow++;
                }
            }
            if ($this->checkWinnerRow($playerTokensInHorizontalRow) || $this->checkWinnerRow($playerTokensInVerticalRow)) {
                $winner = true;
                break;
            }
        }
        return $winner;
    }

    public function winnerDiagonalMovements(string $playerToken): bool
    {
        $boardDimension = $this->gameBuilder->getGame()->getGameBoard()->boardDimension;
        $board = $this->gameBuilder->getGame()->getGameBoard()->board;
        $playerTokensInFirstDiagonal = 0;
        $playerTokensInSecondDiagonal = 0;
        for ($n = 0; $n < $boardDimension; $n++) {
            if ($board[$n][$n] === $playerToken) {
                $playerTokensInFirstDiagonal++;
            }
            $mSecondDiagonal = ($boardDimension - 1) - $n;
            if ($board[$n][$mSecondDiagonal] === $playerToken) {
                $playerTokensInSecondDiagonal++;
            }
        }
        return $this->checkWinnerRow($playerTokensInFirstDiagonal) || $this->checkWinnerRow($playerTokensInSecondDiagonal);
    }

    public function checkWinnerRow(int $playerTokensInARow): bool
    {
        return $playerTokensInARow === $this->gameBuilder->getGame()->getGameBoard()->boardDimension;
    }
}