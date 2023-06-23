<?php

namespace App\DataTables;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PostDataTable extends DataTable
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
            ->editColumn('title', function ($raw) {
                return $raw->title;
            })
            ->editColumn('body', function ($raw) {
                return $raw->body;
            })
            ->editColumn('body', fn($raw) => substr($raw->body, 0, 50) . '...')
            ->editColumn('category.name', function ($raw) {
                return $raw->category->name;
            })
            ->addColumn('actions', function (Post $post) {
                return view('Admin.pages.blog.posts.datatables.action', compact('post'));
            })
            ->rawColumns([
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Post $model
     * @return Builder
     */
    public function query(Post $model)
    {
        return $model->newQuery()->with(['category','admin']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('post-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
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
                            [0, 'asc']
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
            ['name' => 'title', 'data' => 'title', 'title' => __('posts.title')],
            ['name' => 'body', 'data' => 'body', 'title' => __('posts.body') , 'searchable' => false, 'order-able' => false],
            ['name' => 'category.name', 'data' => 'category.name', 'title' => __('posts.category')],
            ['name' => 'admin.name', 'data' => 'admin.name', 'title' => __('posts.admin'), 'searchable' => false],
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
        return 'Post_' . date('YmdHis');
    }
}
