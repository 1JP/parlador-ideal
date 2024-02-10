<?php

namespace Tests\Feature\Http\Controller\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_reset_password(): void
    {
        User::factory()->create([
            'email' => 'john.doe@email.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->post(route('password.update'), [
            'email' => 'john.doe@email.com',
            'password' => '87654321',
        ])->assertStatus(200);
    }

    /** @test */
    public function cannot_fails_with_invalid_credentials(): void
    {
        User::factory()->create([
            'email' => 'john.doe@email.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->post(route('password.update'), [
            'email' => 'teste@gmail.com',
            'password' => '12345678',
        ])->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function cannot_fails_with_empty_credentials(): void
    {
        $this->post(route('password.update'), [
            'email' => '',
            'password' => '',
        ])->assertSessionHasErrors(['email', 'password']);
    }
}
