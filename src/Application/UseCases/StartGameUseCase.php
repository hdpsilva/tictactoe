<?php

namespace App\Application\UseCases;

use App\Domain\Game\Entity\GameBoard;
use App\Domain\Game\Factory\GameBuilder;
use App\Domain\Game\GameService;
use App\Domain\User\Entity\User;


class StartGameUseCase
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
            $playerA = new User($params['playerA']);
            $playerB = new User($params['playerB']);
            $gameBoard = new GameBoard($params['dimension']);
            $gameName = $params['gameName'];
            $gameService = new GameService($gameBuilder);

            $newGame = $gameService->startNewGame($playerA, $playerB, $gameName, $gameBoard);
            return 'Game Created';
        } catch (Exception $ex) {
            error_log($ex->getMessage(), $ex->getCode());
            exit(1);
        }
    }
}