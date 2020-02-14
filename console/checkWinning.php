<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\UseCases\CheckWinningUseCase;

$gameData = array(
    'token' => $argv[1]
);

$checkWinning = new CheckWinningUseCase();
echo $checkWinning->execute($gameData);