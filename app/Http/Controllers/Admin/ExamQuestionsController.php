<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExamQuestionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ExamQuestionsInterface;
use App\Http\Requests\Admin\examQuestions\StoreExamQuestionRequest;
use App\Http\Requests\Admin\examQuestions\UpdateExamQuestionRequest;
use App\Models\ExamQuestions;

class ExamQuestionsController extends Controller
{
    private $examQuestionsInterface;

    public function __construct(ExamQuestionsInterface $examQuestionsInterface)
    {
        $this->examQuestionsInterface = $examQuestionsInterface;
    }

    public function index(ExamQuestionsDataTable $datable)
    {
        return $this->examQuestionsInterface->index($datable);
    }

    public function create()
    {
        return $this->examQuestionsInterface->create();
    }

    public function store(StoreExamQuestionRequest $request)
    {
        return $this->examQuestionsInterface->store($request);
    }

    public function show(ExamQuestions $examQuestion)
    {
        return $this->examQuestionsInterface->show($examQuestion);
    }

    public function edit(ExamQuestions $examQuestion, UpdateExamQuestionRequest $request)
    {
        return $this->examQuestionsInterface->edit($examQuestion, $request);
    }

    public function update(ExamQuestions $examQuestion, UpdateExamQuestionRequest $request)
    {
        return $this->examQuestionsInterface->update($examQuestion, $request);
    }

    public function destroy(ExamQuestions $examQuestion)
    {
        return $this->examQuestionsInterface->destroy($examQuestion);
    }
}
