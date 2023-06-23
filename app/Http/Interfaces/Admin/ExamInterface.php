<?php

namespace App\Http\Interfaces\Admin;

interface ExamInterface
{

    public function index($examDataTable);

    public function create();

    public function store($request);

    public function show($exam);

    public function edit($exam);

    public function update($request, $exam);

    public function destroy($exam);


    public function changeActivation($exam);

    public function changeStatusClosedOrOpened($exam);
}
