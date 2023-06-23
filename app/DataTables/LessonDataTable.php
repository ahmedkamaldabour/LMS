<?php

namespace App\DataTables;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LessonDataTable extends DataTable
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
            ->editColumn('course.title', function ($raw) {
                return $raw->course->title;
            })
            ->editColumn('title', function ($raw) {
                return $raw->title;
            })
            ->editColumn('body', function (Lesson $lesson) {
                return view('Admin.pages.lessons.inc.body', compact('lesson'));
            })
            ->addColumn('actions', function (Lesson $lesson) {
                return view('Admin.pages.lessons.datatables.action', compact('lesson'));
            })
            ->rawColumns([
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Lesson $model
     * @return Builder
     */
    public function query(Lesson $model): Builder
    {
        // when model type is text then    add new colu
        return $model->newQuery()->with('course')->select('lessons.*');


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
                'language' =>
                    (app()->getLocale() === 'es') ?
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
            'id' => new Column(['title' => 'id', 'data' => 'id', 'visible' => true, 'printable' => false, 'searchable' => false, 'exporting' => false]),
            'course.title' => new Column(['title' => __('lesson.course'), 'data' => 'course.title']),
            'title' => new Column(['title' => __('lesson.title'), 'data' => 'title']),
            'time' => new Column(['title' => __('lesson.time'), 'data' => 'time']),
            'type' => new Column(['title' => __('lesson.type'), 'data' => 'type']),
            'body' => new Column(['title' => __('lesson.body'), 'data' => 'body']),
            'actions' => new Column(['title' => __('actions.actions'), 'data' => 'actions', 'orderable' => false, 'searchable' => false, 'printable' => false, 'exportable' => false]),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Lesson_' . date('YmdHis');
    }
}
