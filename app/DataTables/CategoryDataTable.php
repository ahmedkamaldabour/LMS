<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable(mixed $query): DataTableAbstract {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($raw) {
                return $raw->name;
            })
            ->addColumn('actions', function (Category $category) {
                return view('Admin.pages.category.datatables.action', compact('category'));
            })
            ->rawColumns([
                'actions'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Category $model
     * @return Builder
     */
    public function query(Category $model) {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): \Yajra\DataTables\Html\Builder {
        return $this->builder()
            ->setTableId('category-table')
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
            ['name' => 'name', 'data' => 'name', 'title' => 'Name'],
            ['name' => 'actions', 'data' => 'actions', 'title' => 'Actions', 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Category_' . date('YmdHis');
    }
}
