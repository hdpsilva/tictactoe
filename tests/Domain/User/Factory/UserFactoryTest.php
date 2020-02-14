<?php
namespace App\Tests\Domain\User\Factory;

use App\Domain\User\Factory\UserFactory;

use PHPUnit\Framework\TestCase;

class UserFactoryTest extends TestCase
{

    /**
     * @dataProvider playersNames
     * @param string $username
     */
    public function testUserCreateByUsername(string $username)
    {
        $userFactory = new UserFactory();
        $user = $userFactory->createUser($username);
        $this->assertEquals($username, $user->getUsername());
    }

    public function playersNames() {
        return [
            ['jane doe'],
            ['John Doe']
        ];
    }
}