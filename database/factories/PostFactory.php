<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        (Admin::count() == 0) ? ($admin = Admin::factory()->create())
            : ($admin = Admin::first());
        (BlogCategory::count() == 0) ? ($category_blog = BlogCategory::factory()->create())
            : ($category_blog = BlogCategory::inRandomOrder()->first());
        return [
            'title' => [
                'en' => $this->faker->sentence(3),
                'es' => $this->faker->sentence(3),
            ],
            'body' => [
                'en' => $this->faker->paragraph(3),
                'es' => $this->faker->paragraph(3),
            ],
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('PostImage.jpg'),
            'like' => $this->faker->numberBetween(1, 100),
            'view_count' => $this->faker->numberBetween(1, 100),
            'admin_id' => $admin->id,
            'category_id' => $category_blog->id,
        ];
    }
}
