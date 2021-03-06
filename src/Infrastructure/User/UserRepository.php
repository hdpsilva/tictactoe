<?php

namespace App\Infrastructure\User;

use App\Domain\User\Entity\User;

class UserRepository
{

    /**
     * @param User $user
     * @return string
     */
    public function removeUser(User $user): string
    {
        return 'User ' . $user->getUsername() . ' deleted';
    }

    /**
     * @param string $username
     * @return User
     */
    public function findUserByUsername(string $username): User
    {
        return new User($username);
    }

}
