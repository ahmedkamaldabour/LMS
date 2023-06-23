<?php

namespace App\DataTables;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use function __;
use function app;
use function url;

class CommentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('body', fn ($raw) => substr($raw->body, 0, 50) . '...')
            ->editColumn('post.title', fn ($raw) => $raw->post->title)
            ->editColumn('status', fn ($raw) => ($raw->status == 1) ? __('comment.approved') : __('comment.rejected'))
            ->addColumn('actions', fn (Comment $comment) => view('Admin.pages.blog.comment.datatables.action',
                compact('comment')));
    }

    /**
     * Get query source of dataTable.
     *
     * @return Builder
     */
    public function query(Comment $model)
    {
        return $model->newQuery()->with('post:id,title');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('comment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All records']],
                'buttons' => [
                    ['extend' => 'print', 'className' => 'btn btn-primary m-2', 'text' => '<i class="fa fa-print"></i>' . __('actions.print')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i>' . __('actions.export')]

                ],
                'order' => [
                    [0, 'desc']
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
        return[
            ['name' => 'id', 'data' => 'id', 'title' => 'ID'],
            ['name' => 'post.title', 'data' => 'post.title', 'title' => __('comment.post_title')],
            ['name' => 'body' , 'data' => 'body', 'title' => __('comment.body')],
            ['name' => 'status', 'data' => 'status', 'title' => __('comment.status')],
            ['name' => 'actions', 'data' => 'actions', 'title' => __('actions.actions'), 'orderable' => false, 'searchable' => false , 'printable' => false, 'exportable' => false]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Comment_' . date('YmdHis');
    }
}
