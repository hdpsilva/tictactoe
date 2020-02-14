<?php

namespace App\Domain\User\Factory;

use App\Domain\User\Entity\User;

class UserFactory
{
    public function createUser(string $username) : User {
        return new User($username);
    }
}