<?php

namespace App\Http\Interfaces\Admin;

interface ExamQuestionsInterface
{
    public function index($datable);
    public function create();
    public function store($request);
    public function show($examQuestion);
    public function edit($examQuestion, $request);
    public function update($examQuestion, $request);
    public function destroy($examQuestion);
}
