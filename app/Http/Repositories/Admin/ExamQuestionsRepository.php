<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ExamQuestionsInterface;
use App\Http\Traits\ImageTrait;
use App\Models\Exam;
use App\Models\ExamQuestions;

class ExamQuestionsRepository implements ExamQuestionsInterface
{
    use ImageTrait;

    private $examQuestionModel, $examModel;

    public function __construct(Exam $examModel, ExamQuestions $examQuestionModel)
    {
        $this->examQuestionModel = $examQuestionModel;
        $this->examModel = $examModel;
    }

    public function index($datable)
    {
        return $datable->render('Admin.pages.examQuestions.index');
    }

    public function create()
    {
        $exams = $this->examModel::where('active', true)->get();
        return view('Admin.pages.examQuestions.create', compact('exams'));
    }

    public function store($request)
    {
        $questionImage = $this->uploadImage($request->question_image, $this->examQuestionModel::PATH_IMAGE);

        $this->examQuestionModel::create([
            "exam_id" => $request->exam_id,
            "question" => $request->question,
            'question_image' => $questionImage,
            "active" => $request->active === 'on' ? true : false
        ]);

        toast('Exam Question added successfully', 'success');
        return redirect()->route('admin.examQuestions.index');
    }

    public function show($examQuestion)
    {
        return view('Admin.pages.examQuestions.show', compact('examQuestion'));
    }

    public function edit($examQuestion, $request)
    {
        $exams = $this->examModel::where('active', true)->get();
        return view('Admin.pages.examQuestions.edit', compact('examQuestion', 'exams'));
    }

    public function update($examQuestion, $request)
    {
        if ($request->has('question_image')) {
            $questionImage = $this->uploadImage($request->question_image, $this->examQuestionModel::PATH_IMAGE, $this->examQuestionModel::PATH_IMAGE . $examQuestion->question_image);
        }
        $examQuestion->update([
            'exam_id' => $request->exam_id ?? $examQuestion->exam_id,
            'question' => $request->question ?? $examQuestion->question,
            'question_image' => $questionImage ?? $examQuestion->question_image,
            "active" => $request->active === 'on' ? true : false
        ]);
        toast('Exam Question updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy($examQuestion)
    {
        $examQuestion->delete();
        $this->removeImage($this->examQuestionModel::PATH_IMAGE . $examQuestion->question_image);

        toast('Exam Question deleted successfully', 'success');
        return redirect()->route('admin.examQuestions.index');
    }
}
