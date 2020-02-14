<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Application\UseCases\MarkCellUseCase;

$gameData = array(
    'x' => $argv[1],
    'y' => $argv[2],
    'token' => $argv[3]
);

$markUseCase = new MarkCellUseCase();
echo $markUseCase->execute($gameData);