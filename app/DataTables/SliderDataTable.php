<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query) {
                $editBtn = "<a href='". route('admin.slider.edit', $query->id) ."' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i></a>";
                $deletBtn = "<a href='". route('admin.slider.destroy', $query->id) ."' class='btn btn-danger btn-sm ml-1 delete-item'><i class='fa fa-trash'></i></a>";
               
               return $editBtn . $deletBtn;
            })
            ->addColumn('banner', function($query) {
                return "<img width='350px' src='". asset($query->banner) ."' />";
            })
            ->addColumn('status', function($query) {
                $statusClass = $query->status == 1 ? 'badge-success text-dark' : 'badge-danger';
                $statusText = $query->status == 1 ? 'Active' : 'InActive';
            
                return '<span class="badge ' . $statusClass . '">' . $statusText . '</span>';
            })            
            ->rawColumns(['banner', 'action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->dom('Bfrtip')
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
            Column::make('serial')->title('Serial No.')->addClass('text-left')->width(60),
            Column::make('banner')->title('Banner')->width(150), // Adjusted width for images
            Column::make('title')->title('Title')->addClass('text-truncate')->width(200), // Adjusted width for titles
            Column::make('status')->title('Status')->addClass('text-center')->width(100),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }
    

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}
