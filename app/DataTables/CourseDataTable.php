<?php

namespace App\DataTables;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;
use function app;
use function compact;
use function view;

/**
 *
 */
class CourseDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('id', function() {
                static $i = 1;
                return $i++;

            })
            ->editColumn('title', fn($raw) => $raw->title)
            ->editColumn('description', fn($raw) => substr($raw->description, 0, 50) . '...')
            ->editColumn('category.name', fn($raw) => $raw->category->name)
            ->addColumn('actions', fn(Course $course) => view('Admin.pages.courses.datatables.action', compact('course')))
            ->addColumn('image', fn(Course $course) => view('Admin.pages.courses.datatables.image', compact('course')))
            ->rawColumns([
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(Course $model)
    {
        return $model->newQuery()->withCount('lessons');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('course-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->parameters([
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
            ['name' => 'id', 'data' => 'id', 'title' => 'ID'],
            ['name' => 'title', 'data' => 'title', 'title' => __('courses.title')],
            ['name' => 'description', 'data' => 'description', 'title' => __('courses.description') , 'searchable' => false, 'orderable' => false],
            ['name' => 'category.name', 'data' => 'category.name', 'title' => __('courses.category')],
            ['name' => 'lessons_count', 'data' => 'lessons_count', 'title' => __('courses.lessons'), 'searchable' => false],
            ['name' => 'price', 'data' => 'price', 'title' => __('courses.price'), 'searchable' => false],
            ['name' => 'image', 'data' => 'image', 'title' => __('courses.image'), 'searchable' => false, 'orderable' => false, 'exportable' => false, 'printable' => false],
            ['name' => 'actions', 'data' => 'actions', 'title' => __('actions.actions'), 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Course_' . date('YmdHis');
    }
}
