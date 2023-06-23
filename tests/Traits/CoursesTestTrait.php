<?php

namespace Tests\Traits;

use App\Http\Services\LocalizationService;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\UploadedFile;
use function array_merge;

trait CoursesTestTrait
{
    private function createCourse()
    {
        return Course::factory()->create();
    }


}
