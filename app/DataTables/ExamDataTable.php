<?php

namespace App\DataTables;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use function __;
use function app;
use function compact;
use function substr;
use function url;
use function view;

class ExamDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('close', fn (Exam $exam) => view('Admin.pages.exams.datatables.status', compact('exam')))
            ->addColumn('active', fn (Exam $exam) => view('Admin.pages.exams.datatables.activation', compact('exam')))
            ->addColumn('actions', fn (Exam $exam) => view('Admin.pages.exams.datatables.action', compact('exam')))
            ->rawColumns([
                'active',
                'close',
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(Exam $model) {
        return $model->newQuery()->with('admin')->withCount('questions');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->setTableId('examdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'scrollX' => true,
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-primary m-2', 'text' => '<i class="fa fa-print"></i>' . __('actions.print')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i>' . __('actions.export')]

                ],
                'order' => [
                    [1, 'asc']
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
    protected function getColumns() {
        return [
            // 'id',name, # Questions , Exam type, active, start, end, time, closed, admin name, actions
            ['data' => 'id', 'name' => 'id', 'title' => __('exams.id')],
            ['data' => 'name', 'name' => 'name', 'title' => __('exams.name')],
            ['data' => 'questions_count', 'name' => 'questions_count', 'title' => __('exams.questions_number'), 'searchable' => false],
            ['data' => 'exam_type', 'name' => 'exam_type', 'title' => __('exams.exam_type')],
            ['data' => 'active', 'name' => 'active', 'title' => __('exams.active')],
            ['data' => 'start', 'name' => 'start', 'title' => __('exams.start')],
            ['data' => 'end', 'name' => 'end', 'title' => __('exams.end')],
            ['data' => 'time', 'name' => 'time', 'title' => __('exams.time')],
            ['data' => 'close', 'name' => 'close', 'title' => __('exams.close')],
            ['data' => 'admin.name', 'name' => 'admin.name', 'title' => __('exams.admin_name')],
            ['data' => 'actions', 'name' => 'actions', 'title' => __('actions.actions'), 'orderable' => false, 'searchable' => false, 'exportable' => false, 'printable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Exam_' . date('YmdHis');
    }
}
