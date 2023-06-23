<?php

namespace App\Http\Interfaces\Admin;

interface LessonInterface
{

    public function index($dataTable);

    public function create();

    public function store($request);

    public function show($lesson);

    public function edit($lesson);

    public function update($request, $lesson);

    public function destroy($lesson);
}
