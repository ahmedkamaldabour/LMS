<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ExamInterface;
use App\Models\Exam;
use function response;
use function toast;

class ExamRepository implements ExamInterface
{
    private $examModel;

    public function __construct(Exam $exam)
    {
        $this->examModel = $exam;
    }

    public function index($examDataTable)
    {
        return $examDataTable->render('Admin.pages.exams.index');
    }

    public function create()
    {
        return view('Admin.pages.exams.create');
    }

    public function store($request)
    {
        $this->examModel->create($request->validated() + ['admin_id' => $request->user_id]);
        toast(__('exams.add_exam_success'), 'success');
        return redirect()->route('admin.exams.index');
    }

    public function show($exam)
    {
        $examQuestions = $exam->questions;
        return view('Admin.pages.exams.show', compact('exam', 'examQuestions'));
    }

    public function edit($exam)
    {
        return view('Admin.pages.exams.edit', compact('exam'));
    }

    public function update($request, $exam)
    {
        $exam->update($request->validated() + ['admin_id' => $request->user_id]);
        toast(__('exams.edit_exam_success'), 'success');
        return redirect()->route('admin.exams.index');
    }

    public function destroy($exam)
    {
        $exam->delete();
        toast(__('exams.delete_exam_success'), 'success');
        return redirect()->route('admin.exams.index');
    }

    public function changeActivation($exam)
    {
        $exam->update(['active' => !$exam->active]);
        return response()->json(['message' => 'success']);
    }

    public function changeStatusClosedOrOpened($exam)
    {
        $exam->update(['close' => !$exam->close]);
        return response()->json(['message' => 'success']);
    }

}
