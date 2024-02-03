<?php

namespace Tests\Feature\Http\Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_a_user()
    {
        $name = fake()->name();
        $email = fake()->safeEmail();
        $response = $this->postJson(route('api.users.store'), [
            'name' => $name,
            'email' => $email,
            'password' => 'Teste@12',
        ]);
        
        $response->assertStatus(200);

        $response->assertJsonFragment([
            'name' => $name,
            'email' => $email,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
        ]);
    }

    /** @test */
    public function cannot_add_a_user()
    {
        $this->postJson(route('api.users.store'), [
            'name' => fake()->name(),
            'password' => 'Teste@12',
        ])->assertStatus(422);

        $this->postJson(route('api.users.store'), [
            'email' => fake()->safeEmail(),
            'password' => 'Teste@12',
        ])->assertStatus(422);

        $this->postJson(route('api.users.store'), [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
        ])->assertStatus(422);
    }

    /** @test */
    public function cannot_create_user_with_email_exists()
    {
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'teste@teste.com',
            'password' => 'Test@12'
        ]);

        $this->postJson(route('api.users.store'), [
            'name' => fake()->name(),
            'email' => 'teste@teste.com',
            'password' => 'Teste@12',
        ])->assertStatus(422);
    }

    /** @test */
    public function you_cannot_create_a_user_with_a_password_of_at_least_eight_characters()
    {
        $this->postJson(route('api.users.store'), [
            'name' => fake()->name(),
            'email' => 'teste@teste.com',
            'password' => 'Teste',
        ])->assertStatus(422);
    }
}
