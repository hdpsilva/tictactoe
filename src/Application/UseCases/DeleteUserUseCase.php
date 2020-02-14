<?php
namespace App\Application\UseCases;

use App\Domain\User\UserService;
use App\Infrastructure\Game\GameRepository;
use App\Infrastructure\User\UserRepository;

class DeleteUserUseCase
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
            $userRepo = new UserRepository();
            $gameRepo = new GameRepository();

            $userService = new UserService($userRepo, $gameRepo);

            return $userService->deleteUser($params['username']);

        } catch (Exception $ex) {
            error_log($ex->getMessage(), $ex->getCode());
            exit(1);
        }
    }
}