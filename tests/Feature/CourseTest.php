<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use JsonException;
use Tests\TestCase;
use Tests\Traits\CoursesTestTrait;
use function route;

/**
 *
 * Class CategoryTest for testing Category
 * @package Tests\Feature
 * @group category
 * @group category.index
 * @group category.create
 * @group category.store
 * @group category.edit
 * @group category.update
 * @group category.destroy
 * @group category.show
 *
 */
class CourseTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use CoursesTestTrait;

    private $admin;

    public function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::factory()->create();
    }


    public function test_course_index_when_login()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.courses.index'));
        $this->assertAuthenticated();
        $response->assertStatus(302);
    }

    public function test_course_create_when_login()
    {
        $response = $this->actingAs($this->admin)->get(route('admin.courses.create'));
        $this->assertAuthenticated();
        $response->assertStatus(302);
    }

    public function test_course_create_without_login()
    {
        $response = $this->get(route('admin.courses.create'));
        $this->assertGuest();
        $response->assertStatus(302);
    }

    public function test_course_store_with_correct_and_complete_data()
    {
        $data = [
            'title_en' => $this->faker->text,
            'title_es' => $this->faker->text,
            'slug' => $this->faker->slug,
            'description_en' => $this->faker->text,
            'description_es' => $this->faker->text,
            'category_id' => Category::factory()->create()->id,
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'intro' => UploadedFile::fake()->create('video.mp4'),
            'price' => $this->faker->numberBetween(100, 1000),
            'requirements_en' => $this->faker->text,
            'requirements_es' => $this->faker->text,
        ];
        $this->actingAs($this->admin)
            ->call('POST', route('admin.courses.store'), $data)
            ->assertSessionHasNoErrors();
    }

    public function test_course_store_without_correct_or_complete_data()
    {
        $data = [
            'title_en' => '',
            'title_es' => '',
            'slug' => $this->faker->slug,
            'description_en' => $this->faker->text,
            'description_es' => $this->faker->text,
            'category_id' => Category::factory()->create()->id,
            'image' => UploadedFile::fake()->image('avatar.jpg'),
            'intro' => UploadedFile::fake()->create('video.mp4'),
            'price' => $this->faker->numberBetween(100, 1000),
            'requirements_en' => $this->faker->text,
            'requirements_es' => $this->faker->text,
        ];
        $this->actingAs($this->admin)
            ->from('admin/courses/create')->call('POST', route('admin.courses.store'), $data)
            ->assertRedirect('admin/courses/create')
            ->assertSessionHasErrors();
    }

    public function test_edit_course()
    {
        $course = $this->createCourse();
        $responses = $this->actingAs($this->admin)->from('admin/courses/edit/'. $course->slug)->get(route('admin.courses.edit', $course));
        $responses->assertStatus(302);
    }

    /**
     * @throws JsonException
     */
    public function test_update_course_with_correct_and_complete_data()
    {
        $this->actingAs($this->admin);
        $course = $this->createCourse();

        $data = [
                'title_en' => $this->faker->text,
            'title_es' => $this->faker->text,
            'slug' => $this->faker->slug,
            'description_en' => $this->faker->text,
            'description_es' => $this->faker->text,
            'category_id' => Category::factory()->create()->id,
            'price' => $this->faker->numberBetween(100, 1000),
            'requirements_en' => $this->faker->text,
            'requirements_es' => $this->faker->text,
        ];

        $this->call('PUT', route('admin.courses.update', $course), $data)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.courses.index'));

    }

    /**
     * @throws JsonException
     */
    public function test_update_course_without_correct_or_complete_data()
    {
        $this->actingAs($this->admin);
        $course = $this->createCourse();
        $data = [
            'title_en' => '',
            'title_es' => $this->faker->text,
            'slug' => $this->faker->slug,
            'description_en' => $this->faker->text,
            'description_es' => $this->faker->text,
            'category_id' => Category::factory()->create()->id,
            'price' => $this->faker->numberBetween(100, 1000),
            'requirements_en' => $this->faker->text,
            'requirements_es' => $this->faker->text,
        ];
        $this->call('PUT', route('admin.courses.update', $course), $data)
            ->assertSessionHasErrors();
        $this->assertDatabaseMissing('courses', $data);
    }

    /**
     * @throws JsonException
     */
    public function test_course_destroy()
    {
        $this->actingAs($this->admin);
        $course = $this->createCourse();
        $this->call('DELETE', route('admin.courses.delete', $course))
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.courses.index'));
    }


}
