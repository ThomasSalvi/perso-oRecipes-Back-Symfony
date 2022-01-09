<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testTrue()
    {
        $user = new User();
        $user -> setEmail("test@test.fr");
        $this->assertTrue($user -> getEmail() === "test@test.fr");
    }
    public function testFalse()
    {
        $user = new User();
        $user -> setEmail("true@test.fr");
        $this->assertFalse($user -> getEmail() === "false@test.fr");
    }
    public function testEmpty()
    {
        $user = new User();
        $this->assertEmpty($user -> getEmail());
    }
}
