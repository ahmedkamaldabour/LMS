<?php

namespace App\Http\Traits\Admin;

use App\Http\Services\LocalizationService;
use App\Models\Course;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use function array_merge;

trait CourseTrait
{
    private function uploadImageAndIntro($request, $course = null)
    {
        if ($course) {
            $image = $this->uploadFile($request->image, $this->course::PATH_IMAGE, $course->image) ?? $course->image;
            $intro = $this->uploadFile($request->intro, $this->course::PATH_VIDEO, $course->intro) ?? $course->intro;
        } else {
            $image = $this->uploadFile($request->image, $this->course::PATH_IMAGE);
            $intro = $this->uploadFile($request->intro, $this->course::PATH_VIDEO);
        }
        return [
            'image' => $image,
            'intro' => $intro
        ];
    }

    private function removeCourseImageAndIntro($course)
    {
        $this->removeFile($this->course::PATH_IMAGE . $course->image);
        $this->removeFile($this->course::PATH_VIDEO . $course->intro);
        $course->delete();
    }

    private function addOrUpdate($request, $upload)
    {
        $data = LocalizationService::getLocalizationDataAsArray($this->course::$translatableData, $request);
        $this->course->fill(array_merge($data, [
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $upload['image'],
            'intro' => $upload['intro']
        ]))->save();

    }

    private function getCategories()
    {
        return $this->category->get();
    }

    private function getCourses()
    {
        return Course::get(['id', 'title']);
    }

}
