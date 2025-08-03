<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginEmailTest extends TestCase
{
    public function test_user_can_login_with_email()
    {
        $response = $this->postJson('/api/login', [
            'type' => 'email',
            'email' => 'sana@example.com',
            'password' => 'secret123',
        ]);

        $response->assertStatus(200);
    }
}

