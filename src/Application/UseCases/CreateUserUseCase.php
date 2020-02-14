<?php

namespace App\Application\UseCases;

use App\Domain\User\UserService;
use App\Infrastructure\Game\GameRepository;
use App\Infrastructure\User\UserRepository;

class CreateUserUseCase
{
    public function __construct()
    {
    }

    /**
     * @param array $params
     */
    public function execute($params = null)
    {
        try {
            $userRepo = new UserRepository();
            $gameRepo = new GameRepository();

            $userService = new UserService($userRepo, $gameRepo);
            $newUser = $userService->createUser($params['username']);

            echo "Player was created: " . $newUser->getUsername();
        } catch (\Exception $ex) {
            error_log($ex->getMessage(), $ex->getCode());
            exit(1);
        }
    }
}