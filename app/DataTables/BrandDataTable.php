<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BrandDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addIndexColumn()
        ->addColumn('action', function($query) {
            $editBtn = "<a href='". route('admin.brand.edit', $query->id) ."' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a>";
            $deletBtn = "<a href='". route('admin.brand.destroy', $query->id) ."' class='btn btn-danger btn-sm ml-1 delete-item'><i class='fa fa-trash'></i></a>";
            
            return $editBtn . $deletBtn;
        })
        ->addColumn('logo', function($query) {
            return "<img width='350px' src='". asset($query->logo) ."' />";
        })
        ->addColumn('featured', fn($query) => $query->is_featured == 1
                ? '<span class="badge badge-info">Yes</span>'
                : '<span class="badge badge-danger text-light">No</span>'
        )
        ->addColumn('status', function($query) {
            if ($query->status == 1) {
                $statusBtn = '<label class="custom-switch mt-2">
                                <input type="checkbox" checked name="custom-switch-checkbox" data-id="'. $query->id .'" class="custom-switch-input change-status" />
                                <span class="custom-switch-indicator mr-1"></span> <span class="badge badge-success">Active</span> 
                              </label>
                ';
            }else { 
                $statusBtn = '<label class="custom-switch mt-2">
                                <input type="checkbox" name="custom-switch-checkbox" data-id="'. $query->id .'" class="custom-switch-input change-status" />
                               <span class="custom-switch-indicator mr-1"></span>
                               <span class="badge badge-danger">InActive</span>
                              </label>
                ';
            }
            return $statusBtn;
        })
        ->rawColumns(['action', 'logo', 'featured', 'status'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('brand-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')->title('SN')->searchable(false)->orderable(false)->width(100)
                ->addClass('text-center'),
            Column::make('logo')->searchable(false)->orderable(false)->width(300),
            Column::make('name'),
            Column::make('featured'),
            Column::make('status')->width(200),
            Column::computed('action')->width(200)->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brand_' . date('YmdHis');
    }
}
