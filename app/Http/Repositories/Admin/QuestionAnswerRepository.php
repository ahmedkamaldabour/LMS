<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\QuestionAnswerInterface;
use App\Http\Services\LocalizationService;
use App\Http\Traits\Admin\QuestionTrait;
use App\Models\ExamQuestions;
use App\Models\QuestionAnswer;

class QuestionAnswerRepository implements QuestionAnswerInterface
{
    use QuestionTrait;
    private $answerModel;
    public function __construct(QuestionAnswer $answer)
    {
        $this->answerModel = $answer;
    }

    public function index($dataTable)
    {
        return $dataTable->render('Admin.pages.exams.answer.index');
    }

    public function create()
    {
        $questions =  $this->getQuestions();
        return view('Admin.pages.exams.answer.create',compact('questions'));
    }

    public function store($request)
    {
//        $data = LocalizationService::getLocalizationDataAsArray(QuestionAnswer::$translatableData, $request);
        $this->answerModel::create([
           'exam_question_id' => $request->exam_question_id,
            'answer' => $request->answer,
            'correct' => $request->correct
        ]);


        toast(__('question_answer.add') , 'success');
        return redirect(route('admin.question_answer.index'));
    }

    public function edit($answer){
        $questions =  $this->getQuestions();
        return view('Admin.pages.exams.answer.edit',compact('answer','questions'));
    }

    public function update($request ,$answer){
//        $data = LocalizationService::getLocalizationDataAsArray(QuestionAnswer::$translatableData,$request);

        $answer->update([
            'answer' => $request->answer,
            'correct' => $request->correct ?? 0,
        ]);
        toast(__('question_answer.update') , 'success');
        return redirect(route('admin.question_answer.index'));
    }

    public function delete($answer){
        $answer->delete();
        toast(__('question_answer.remove') , 'success');
        return redirect(route('admin.question_answer.index'));
    }



}
