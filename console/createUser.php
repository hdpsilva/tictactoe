<?php

require __DIR__.'/../vendor/autoload.php';

use App\Application\UseCases\CreateUserUseCase;

$create =  new CreateUserUseCase();
$create->execute(array('username' => $argv[1]));


