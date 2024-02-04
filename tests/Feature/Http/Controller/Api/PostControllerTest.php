<?php

namespace Tests\Feature\Http\Controller\Api;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @var User */
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->be($this->user = User::factory()->create());
    }

    /** @test */
    public function it_can_create_a_post()
    {
        $this->post(route('api.posts.store'), [
            'post' => 'This is a post',
        ])->assertStatus(200);

        $this->assertDatabaseHas('posts', [
            'post' => 'This is a post',
        ]);
    }

    /** @test */
    public function it_can_update_a_post()
    {
        $post = Post::factory()->create();

        $this->put(route('api.posts.update', $post->id), [
            'post' => 'This is a post',
        ])->assertStatus(200);

        $this->assertDatabaseHas('posts', [
            'post' => 'This is a post',
        ]);
    }

    /** @test */
    public function it_can_delete_a_post()
    {
        $post = Post::factory()->create();

        $this->delete(route('api.posts.destroy', $post->id))
            ->assertStatus(200);

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
        ]);
    }
    /** @test */
    public function cannot_create_a_post()
    {
        $this->post(route('api.posts.store'), [
            'post' => 'Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se a contínua 
            expansão de nossa atividade representa uma abertura para a melhoria dos conhecimentos 
            estratégicos para atingir a excelência.A prática cotidiana prova que a expansão dos mercados mundiais não pode mais se dissociar do fluxo de informações.',
        ])->assertSessionHasErrors();
    }
}
