<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExamDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\ExamInterface;
use App\Http\Requests\exam\StoreExamReqeuest;
use App\Http\Requests\exam\UpdateExamReqeuest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    private $examInterface;

    public function __construct(ExamInterface $examInterface)
    {
        $this->examInterface = $examInterface;
        $this->middleware('merge-user_id')->only(['store', 'update']);

    }

    public function index(ExamDataTable $examDataTable)
    {
        return $this->examInterface->index($examDataTable);
    }

    public function create()
    {
        return $this->examInterface->create();
    }

    public function store(StoreExamReqeuest $request)
    {
        return $this->examInterface->store($request);
    }

    public function show(Exam $exam)
    {
        return $this->examInterface->show($exam);
    }

    public function edit(Exam $exam)
    {
        return $this->examInterface->edit($exam);
    }

    public function update(UpdateExamReqeuest $request, Exam $exam)
    {
        return $this->examInterface->update($request, $exam);
    }

    public function destroy(Exam $exam)
    {
        return $this->examInterface->destroy($exam);
    }

    public function changeActivation(Exam $exam) {
        return $this->examInterface->changeActivation($exam);
    }

    public function changeStatusClosedOrOpened(Exam $exam) {
        return $this->examInterface->changeStatusClosedOrOpened($exam);
    }

}
