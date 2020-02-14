<?php
namespace App\Application\UseCases;

use App\Domain\Game\Entity\GameBoard;
use App\Domain\Game\Factory\GameBuilder;
use App\Domain\Game\GameService;
use App\Domain\User\Entity\User;

class CheckWinningUseCase
{
    public function __construct()
    {
    }

    /**
     * @param array $params
     * @return string
     */
    public function execute($params = null)
    {
        try {
            $gameBuilder = new GameBuilder();
            $playerA = new User('a');
            $playerB = new User('b');
            $gameBoard = new GameBoard(3);
            $gameName = 'Test Game';
            $gameService = new GameService($gameBuilder);
            $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);

            if ($gameService->checkIfThereIsAWinner($params['token'])) {
                return 'Win';
            } else {
                return 'No win';
            }
        } catch (\Exception $ex) {
            error_log($ex->getMessage(), $ex->getCode());
            exit(1);
        }
    }
}