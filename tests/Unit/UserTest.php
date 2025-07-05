<?php

namespace Tests\Unit;

use Tests\TestCase; // Ini WAJIB, jangan extend PHPUnit langsung
use App\Models\User;

class UserTest extends TestCase
{
    public function test_email_user_terisi()
    {
        $user = User::factory()->make();

        $this->assertNotEmpty($user->email);
    }
}
 