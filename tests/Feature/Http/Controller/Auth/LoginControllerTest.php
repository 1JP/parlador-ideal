<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_user_can_authenticate(): void
    {
        $this->assertGuest();

        User::factory()->create([
            'email' => 'john.doe@email.com',
            'password' => bcrypt('12345678'),
        ]);

        $this->post(route('login'), [
            'email' => 'john.doe@email.com',
            'password' => '12345678',
        ])->assertFound()->assertRedirect(route('posts.index'));

        $this->assertAuthenticated();
    }

    /** @test */
    public function it_user_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->assertAuthenticated();

        $this->get(route('logout'))
            ->assertStatus(405);
    }

    /** @test */
    public function it_user_authentication_fails_with_invalid_credentials(): void
    {
        $this->assertGuest();

        $response = $this->post(route('login'), [
            'email' => 'john.doe@email.com',
            'password' => 'wrong_password',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'As credenciais fornecidas estão incorretas.'
        ]);

        $this->assertGuest();
    }

    /** @test */
    public function it_user_authentication_fails_with_empty_credentials(): void
    {
        $this->assertGuest();

        $this->post(route('login'), [
            'email' => '',
            'password' => '',
        ])->assertSessionHasErrors(['email', 'password']);

        $this->assertGuest();
    }
}
