<?php

namespace App\DataTables;

use App\Models\ExamQuestions;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExamQuestionsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('question', fn ($raw) => substr($raw->question, 0, 20) . '...')
            ->editColumn('exam_id', fn ($examQuestions) => $examQuestions->exam->name)
            ->addColumn('question_image', fn (ExamQuestions $examQuestion) => view('Admin.pages.examQuestions.datatables.image', compact('examQuestion')))
            ->editColumn('created_at', function ($data) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans();
            })->editColumn('updated_at', function ($data) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->diffForHumans();
            })->addColumn('actions', function (ExamQuestions $examQuestions) {
                return view('Admin.pages.examQuestions.datatables.action', compact('examQuestions'));
            })
            ->rawColumns([
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ExamQuestions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ExamQuestions $model)
    {
        return $model->newQuery()->with('exam');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'scrollX' => true,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-primary m-2', 'text' => '<i class="fa fa-print"></i>' . trans('actions.print')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i>' . trans('actions.export')],

                ],
                'order' => [
                    0, 'desc'
                ],
                'language' => (app()->getLocale() === 'es') ?
                    [
                        'url' => url('//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json')
                    ] :
                    [
                        'url' => url('//cdn.datatables.net/plug-ins/1.10.25/i18n/English.json')
                    ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(
                [
                    'title' => 'id',
                    'data' => 'id',
                    'visible' => true,
                    'printable' => true,
                    'searchable' => true,
                    'exporting' => true
                ]
            ),
            'question' => new Column(
                [
                    'title' => trans('examQuestions.question'),
                    'data' => 'question',
                    'visible' => true,
                    'printable' => true,
                    'searchable' => true,
                    'exporting' => true
                ]
            ),
            'exam_id' => new Column(
                [
                    'title' => trans('examQuestions.examQuestions'),
                    'data' => 'exam.name',
                    'visible' => true,
                    'printable' => true,
                    'searchable' => true,
                    'exporting' => true
                ]
            ),

            'question_image' => new Column(
                [
                    'title' => trans('examQuestions.question_image'),
                    'data' => 'question_image',
                    'visible' => true,
                    'printable' => true,
                    'searchable' => false,
                    'exporting' => false

                ]
            ),
            Column::make('created_at'),
            Column::make('updated_at'),
            'actions' => new Column([
                'title' =>
                __('examQuestions.actions'), 'data' =>
                'actions', 'orderable' => false,
                'searchable' => false,
                'printable' => false,
                'exportable' => false
            ]),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ExamQuestions_' . date('YmdHis');
    }
}
