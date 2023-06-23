<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\CourseInterface;
use App\Http\Traits\Admin\CourseTrait;
use App\Http\Traits\FileTrait;
use App\Models\Category;
use App\Models\Course;
use function toast;

class CourseRepository implements CourseInterface
{
    use FileTrait;
    use CourseTrait;

    private $category;
    private $course;

    public function __construct(Category $category, Course $course)
    {
        $this->category = $category;
        $this->course = $course;
    }

    public function index($dataTable)
    {
        return $dataTable->render('Admin.pages.courses.index');
    }

    public function create()
    {
        $categories = $this->getCategories();
        return view('Admin.pages.courses.create', compact('categories'));
    }

    public function store($request)
    {
        $upload = $this->uploadImageAndIntro($request);
        $this->addOrUpdate($request, $upload);
        toast(__('courses.success_add'), 'success');
        return redirect()->route('admin.courses.index');
    }

    public function show($course)
    {
        $lessons = $course->lessons()->paginate();
        return view('Admin.pages.courses.show', compact('course', 'lessons'));
    }

    public function edit($course)
    {
        $categories = $this->getCategories();
        return view('Admin.pages.courses.edit', compact('course', 'categories'));
    }

    public function update($request, $course)
    {
        $upload = $this->uploadImageAndIntro($request, $course);
        $this->addOrUpdate($request, $upload);
        toast(__('courses.success_update'), 'success');
        return redirect()->route('admin.courses.index');

    }

    public function destroy($course)
    {
        $this->removeCourseImageAndIntro($course);
        toast(__('courses.success_remove'), 'success');
        return redirect()->route('admin.courses.index');
    }
}
