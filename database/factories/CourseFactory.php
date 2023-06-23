<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'title' => [
                'en' => $this->faker->word,
                'es' => $this->faker->word
            ],
            'slug' => $this->faker->slug,
            'image' => UploadedFile::fake()->image('course.jpg'),
            'intro' => UploadedFile::fake()->create('video.mp4'),
            'description' => [
                'en' => $this->faker->paragraph(2),
                'es' => $this->faker->paragraph(2)]
            ,
            'requirements' => [
                'en' => $this->faker->paragraph(2),
                'es' => $this->faker->paragraph(2)
            ],
            'price' => $this->faker->numberBetween(100, 1000),
            'category_id' => CategoryFactory::new()->create()->id
        ];
    }
}

