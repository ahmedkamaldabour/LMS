<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use Database\Seeders\CategorySeed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
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

    public function test_category_index()
    {
        $res = $this->actingAs($this->admin)->get('admin/category/index');
        $res->assertStatus(302);
        $this->assertAuthenticated();
    }

    public function test_category_create()
    {
        $response = $this->actingAs($this->admin)->get('admin/category/create');
        $this->assertAuthenticated();
    }

    public function test_category_store()
    {
       $this->actingAs($this->admin)->post('admin/category/store',[
            'name_en' => 'test',
            'name_es' => 'tst'
       ]);

        $this->assertDatabaseCount('categories',1);
    }

    public function test_category_store_not_complete()
    {
        $this->post('admin/category/store',[
            'name_en' => 'test',
            'name_es' => 'tst'
        ]);

        $this->assertDatabaseCount('categories',0);
    }

    public function test_a_name_en_is_required()
    {
        $response = $this->actingAs($this->admin)->post('admin/category/store',[
            'name_en' => '',
            'name_es' => ''
        ]);

        $response->assertSessionHasErrors(['name_en', 'name_es']);
    }

    public function test_a_category_updated()
    {
         $this->post('admin/category/store',[
            'name'=>['en'=>'test_en','es'=>'test_es']
        ]);
         $category = Category::first();

        $response = $this->put('admin/category/update/'.$category->id,[
            'name'=>['en'=>'new test_en','es'=>'new test_es']
        ]);
        $this->assertEquals('new test_en',Category::first()->name);

    }


}
