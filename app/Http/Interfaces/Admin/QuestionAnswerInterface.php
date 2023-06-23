<?php

namespace App\Http\Interfaces\Admin;

interface QuestionAnswerInterface
{
    public function index($dataTable);
    public function create();
    public function store($request);
    public function edit($answer);
    public function update($request,$answer);
    public function delete($answer);
}
