<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\UseCases\StartGameUseCase;
use App\Domain\Game\Entity\GameBoard;

$gameData = array(
    'playerA' => $argv[1],
    'playerB' => $argv[2],
    'gameName' => $argv[3],
    'dimension' => empty($argv[4]) ? GameBoard::BOARD_DIMENSION_DEFAULT : $argv[4]
);

$start = new StartGameUseCase();
echo $start->execute($gameData);