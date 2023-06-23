<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LessonDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\LessonInterface;
use App\Http\Requests\Admin\Lessons\CreateLessonRequest;
use App\Http\Requests\Admin\Lessons\UpdateLessonRequest;
use App\Models\Lesson;


class LessonController extends Controller
{


    private LessonInterface $lessonInterface;

    public function __construct(LessonInterface $lessonInterface)
    {
            $this->lessonInterface = $lessonInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LessonDataTable $dataTable)
    {
        return $this->lessonInterface->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  $this->lessonInterface->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLessonRequest $request)
    {
        return $this->lessonInterface->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return $this->lessonInterface->edit($lesson);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *  @param Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        return $this->lessonInterface->update($request,$lesson);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function delete(Lesson $lesson)
    {
        return $this->lessonInterface->destroy($lesson);
    }
}
