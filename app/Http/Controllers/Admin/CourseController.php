<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CourseDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\CourseInterface;
use App\Http\Requests\Admin\course\StoreCourseRquest;
use App\Http\Requests\Admin\course\UpdateCourseRquest;
use App\Models\Course;
use Illuminate\Http\Response;

class CourseController extends Controller
{

    private $courseInterface;

    public function __construct(CourseInterface $courseInterface)
    {
        $this->courseInterface = $courseInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CourseDataTable $dataTable)
    {
        return $this->courseInterface->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->courseInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCourseRquest $request
     * @return Response
     */
    public function store(StoreCourseRquest $request)
    {
        return $this->courseInterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return $this->courseInterface->show($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return $this->courseInterface->edit($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRquest $request, Course $course)
    {
        return $this->courseInterface->update($request, $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        return $this->courseInterface->destroy($course);
    }
}
