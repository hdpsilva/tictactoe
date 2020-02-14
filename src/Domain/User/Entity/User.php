<?php

namespace App\Domain\User\Entity;

use App\Domain\Game\Entity\Player;

/**
 * Class User
 * @package App\Model
 */
class User implements Player
{
    /**
     * @var string
     */
    protected $username;


    /**
     * User constructor.
     * @param string $username
     */
    public function __construct(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}