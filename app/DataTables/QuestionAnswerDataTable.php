<?php

namespace App\DataTables;

use App\Models\QuestionAnswer;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;

class QuestionAnswerDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract {
        return datatables()
            ->eloquent($query)

            ->editColumn('exam_question_id', fn ($raw) => substr($raw->examQuestion->question, 0, 50) . '...')

            ->editColumn('answer', fn($raw) => substr($raw->answer , 0, 50) . '...')

            ->editColumn('correct', function ($raw) {
                return $raw->correct ? __('question_answer.active') : __('question_answer.in_active');
            })
            ->addColumn('actions', function (QuestionAnswer $answer) {
                return view('Admin.pages.exams.answer.datatables.action', compact('answer'));
            })
            ->rawColumns([
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param QuestionAnswer $model
     * @return Builder
     */
    public function query(QuestionAnswer $model) {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder {
        return $this->builder()
            ->setTableId('question-answer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->parameters([
                'responsive'   => true,
                'autoWidth'    => false,
                'lengthMenu'   => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons'      => [
                    ['extend' => 'print', 'className' => 'btn btn-primary m-2', 'text' => '<i class="fa fa-print"></i>' . trans('actions.print')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i>' . trans('actions.export')],

                ],
                'order' => [
                    0, 'desc'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => 'ID'],
            ['name' => 'exam_question_id', 'data' => 'exam_question_id', 'title' => 'Question'],
            ['name' => 'answer', 'data' => 'answer', 'title' => 'Answer'],
            ['name' => 'correct', 'data' => 'correct', 'title' => 'Correct'],
            ['name' => 'actions', 'data' => 'actions', 'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Question_Answer_' . date('YmdHis');
    }
}
