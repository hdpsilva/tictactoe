<?php

namespace App\Application\UseCases;

use App\Domain\Game\Entity\GameBoard;

class MarkCellUseCase
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
           $gameBoard = new GameBoard(3);
           $gameBoard->markCellWithToken($params['x'],$params['y'], $params['token']);
           return "Cell Marked";
        } catch (\Exception $ex) {
            error_log($ex->getMessage(), $ex->getCode());
            exit(1);
        }
    }
}