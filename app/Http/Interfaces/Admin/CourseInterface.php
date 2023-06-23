<?php

namespace App\Http\Interfaces\Admin;

interface CourseInterface
{
    public function index($dataTable);

    public function create();

    public function store($request);

    public function show($course);

    public function edit($course);

    public function update($request, $course);

    public function destroy($course);

}
