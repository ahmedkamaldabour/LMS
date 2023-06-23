<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\BlogCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Tests\Traits\PostsTrait;

class PostTest extends TestCase
{
    use RefreshDatabase,
        WithFaker,
        PostsTrait;

    private $admin;
    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
    }

    public function test_posts_login_index()
    {
       $response = $this->actingAs($this->admin)->get('admin/posts/index');
       $this->assertAuthenticated();
       $response->assertStatus(302);
       $response->assertDontSee('No Post Found');
    }
    public function test_posts_login_create()
    {
        $response = $this->actingAs($this->admin)->get('admin/posts/create');
        $this->assertAuthenticated();
        $response->assertStatus(302);
    }

    /**
     * @throws \JsonException
     */
    public function test_posts_store()
    {
        $this->actingAs($this->admin);
        $data = [
            'title_en'=>fake()->title,
            'title_es'=>fake()->title,
            'slug'=> fake()->slug,
            'body_en'=>fake()->text,
            'body_es'=>fake()->text,
            'image'=>UploadedFile::fake()->image('logo.png'),
            'like'=>fake()->randomNumber([10,100]),
            'view_count'=>fake()->randomNumber([10,100]),
            'admin_id'=>1,
            'category_id'=>BlogCategory::factory()->create()->id
        ];
        $this->call('POST',route('admin.posts.store'),$data)
        ->assertSessionHasNoErrors();
    }

    /**
     * @throws \JsonException
     */
    public function test_posts_update()
    {
        $this->actingAs($this->admin);
        $post = $this->storePost();
        $data = [
            'title_en'=>fake()->title,
            'title_es'=>fake()->title,
            'slug'=> fake()->slug,
            'body_en'=>fake()->text,
            'body_es'=>fake()->text,
            'image'=>UploadedFile::fake()->image('logo.png'),
            'like'=>fake()->randomNumber([10,100]),
            'view_count'=>fake()->randomNumber([10,100]),
            'admin_id'=>1,
            'category_id'=>BlogCategory::factory()->create()->id
        ];
        $this->call('PUT',route('admin.posts.update',$post),$data)
            ->assertRedirect(route('admin.posts.index'))
            ->assertSessionHasNoErrors();
    }

    /**
     * @throws \JsonException
     */
    public function test_posts_show()
    {
        $this->actingAs($this->admin);
        $post = $this->storePost();
        $this->call('GET',route('admin.posts.show',$post))
            ->assertSessionHasNoErrors();

    }
    /**
     * @throws \JsonException
     */
    public function test_posts_delete()
    {
        $this->actingAs($this->admin);
        $post = $this->storePost();
        $this->call('DELETE',route('admin.posts.delete', $post ))
            ->assertSessionHasNoErrors();
    }
}
