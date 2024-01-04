<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
             // ->addColumn('action', 'product.action')
             ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('vendor.product.edit', $query->id) . "' class='btn btn-primary d-inline'><i class='fa-regular fa-pen-to-square'></i>Edit</a>";
                $deleteBtn = "<a href='" . route('vendor.product.destroy', $query->id) . "' class='btn btn-danger d-inline delete-item'><i class='fa-regular fa-trash-can'></i> Delete</a>";
                $moreBtn = '<div class="dropdown dropleft d-inline">
                <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-gear"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item has-icon" href="'.route('admin.product-image-gallery.index', ['product' => $query->id]).'"><i class="far fa-heart"></i> Image Gallery</a>
                  <a class="dropdown-item has-icon" href="'.route('admin.product-variant.index').'"><i class="far fa-file"></i> Variants</a>
                  <a class="dropdown-item has-icon" href="#"><i class="far fa-clock"></i> Something else here</a>
                </div>
              </div>';

                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('image', function ($query) {
                return $img = "<img width='70px' src='" . asset($query->thumb_image) . "'></img>";
            })
            ->addColumn('type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return '<i class="badge bg-success">New Arrival</i>';
                        break;
                    case 'featured_product':
                        return '<i class="badge bg-warning">Featured Product</i>';
                        break;
                    case 'top_product':
                        return '<i class="badge bg-info">Top Project</i>';
                        break;
                    case 'best_product':
                        return '<i class="badge bg-danger">Best Product</i>';
                        break;

                    default:
                        return '<i class="badge bg-dark">None</i>';
                        break;
                }
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<div class="form-check form-switch mt-2">
                    <input class="form-check-input change-status" checked type="checkbox" id="flexSwitchCheckDefault" data-id="' . $query->id . '">
                  </div>';

                } else {
                    $button = '<div class="form-check form-switch mt-2">
                    <input class="form-check-input change-status" checked type="checkbox" id="flexSwitchCheckDefault" data-id="' . $query->id . '">
                  </div>';

                }

                return $button;
            })
            ->rawColumns(['image', 'type', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
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
            Column::make('id'),
            Column::make('image')->width(150),
            Column::make('name'),
            Column::make('price'),
            Column::make('type')->width(150),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProduct_' . date('YmdHis');
    }
}
