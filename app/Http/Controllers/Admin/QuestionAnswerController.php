<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\QuestionAnswerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\QuestionAnswerInterface;
use App\Http\Requests\Admin\exams\answer\storeAnswerRequest;
use App\Http\Requests\Admin\exams\answer\updateAnswerRequest;
use App\Models\QuestionAnswer;

class QuestionAnswerController extends Controller
{
    private $questionAnswerInterface;

    public function __construct(QuestionAnswerInterface $answer){
        $this->questionAnswerInterface = $answer;
    }

    public function index(QuestionAnswerDataTable $dataTable){
        return $this->questionAnswerInterface->index($dataTable);
    }

    public function create()
    {
        return $this->questionAnswerInterface->create();
    }

    public function store(storeAnswerRequest $request)
    {
        return $this->questionAnswerInterface->store($request);
    }

    public function edit(QuestionAnswer $answer){
        return $this->questionAnswerInterface->edit($answer);
    }
    public function update(updateAnswerRequest $request , QuestionAnswer $answer){
        return $this->questionAnswerInterface->update($request,$answer);
    }

    public function delete(QuestionAnswer $answer){
        return $this->questionAnswerInterface->delete($answer);
    }
}
