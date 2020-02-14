<?php
require __DIR__.'/../vendor/autoload.php';

use App\Application\UseCases\DeleteUserUseCase;

$delete =  new DeleteUserUseCase();
echo $delete->execute(array('username' => $argv[1]));