<?php

namespace App\Domain\User;


use App\Domain\User\Entity\User;
use App\Infrastructure\User\UserRepository;
use App\Infrastructure\Game\GameRepository;
use App\Domain\User\Factory\UserFactory;

class UserService implements UserInterface
{
    protected $userRepo;
    protected $gameRepo;

    public function __construct(UserRepository $userRepo, GameRepository $gameRepository)
    {
        $this->userRepo = $userRepo;
        $this->gameRepo = $gameRepository;
    }

    /**
     * @param string $username
     * @return string
     */
    public function deleteUser(string $username) :string {
        $user = $this->userRepo->findUserByUsername($username);
        return 'User ' . $user->getUsername() . ' deleted';
    }

    /**
     * @param string $username
     * @return User
     */
    public function getUser(string $username) :User {
        return new User($username);
    }

    /**
     * @param string $username
     * @return User
     */
    public function createUser(string $username) :User {
        $userFactory = new UserFactory();
        return $userFactory->createUser($username);
    }

}