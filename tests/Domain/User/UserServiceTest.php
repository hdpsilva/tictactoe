<?php

namespace App\Tests\Domain\User\Factory;

use App\Infrastructure\User\UserRepository;
use App\Infrastructure\Game\GameRepository;
use App\Domain\User\UserService;
use App\Domain\User\Entity\User;

use PHPUnit\Framework\TestCase;

class UserServiceTestTest extends TestCase
{
    public function testUserDelete()
    {
        $userRepo = new UserRepository();
        $gameRepo = new GameRepository();

        $userService = new UserService($userRepo, $gameRepo);

        $user = new User('John');
        $this->assertEquals('User ' . $user->getUsername() . ' deleted', $userService->deleteUser($user->getUsername()));
    }

    public function testFindUser()
    {
        $userRepo = new UserRepository();
        $gameRepo = new GameRepository();

        $userService = new UserService($userRepo, $gameRepo);

        $this->assertInstanceOf(User::class, $userService->getUser('john'));
        $this->assertEquals('john', $userService->getUser('john')->getUsername());

    }

    public function testCreateUser()
    {
        $userRepo = new UserRepository();
        $gameRepo = new GameRepository();

        $userService = new UserService($userRepo, $gameRepo);
        $this->assertInstanceOf(User::class, $userService->createUser('john'));
        $this->assertEquals('john', $userService->createUser('john')->getUsername());
    }

}