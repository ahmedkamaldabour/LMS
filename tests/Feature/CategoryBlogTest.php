<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\BlogCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryBlogTest extends TestCase
{

    use RefreshDatabase;
    private $admin;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->admin = Admin::factory()->create();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        $response = $this->get('/');
//
//        $response->assertStatus(200);
//    }

    public function test_blog_category_index()
    {
        $res = $this->actingAs($this->admin)->get('admin/blog_category/index');
        $res->assertStatus(302);
        $this->assertAuthenticated();
    }

    public function test_blog_category_create()
    {
        $response = $this->actingAs($this->admin)->get('admin/blog_category/create');
        $response->assertStatus(302);
        $this->assertAuthenticated();
    }

    public function test_blog_category_store()
    {
        $this->actingAs($this->admin)->post('admin/blog_category/store',[
            'name_en' => 'en name',
            'name_es' => 'es name',
            'description_en'  => 'eng',
            'description_es'  => 'spain',
        ]);

        $this->assertDatabaseCount('blog_categories',1);
    }

    public function test_blog_category_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->post(
            route('admin.blog_category.store'),
            [
                'name' => ['en' => 'cat en' , 'es' => 'cat es'],
                'description' => ['en' => 'desc en' , 'es' => 'desc es'],
            ],
        );

        $category = BlogCategory::first();
        $this->put(
            route('admin.blog_category.update', $category->id),
            [
                'name' => ['en' => 'cat en u' , 'es' => 'cat es u'],
                'description' => ['en' => 'desc en u' , 'es' => 'desc es u']
            ],
        );
        // dd($category);

        $this->assertEquals('cat en u', $category->name);
    }


}