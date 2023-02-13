<?php

namespace App\DataTables;

use App\Models\SparepartShop;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\Traits\DatatableHelper;

class SparepartShopDataTable extends DataTable
{
    use DatatableHelper;

    protected $table = 'sparepart_shop';

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
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->editColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SparepartShop $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SparepartShop $model)
    {
        return $model->newQuery()->filter()->with(['shope', 'sparepart']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $this->overWriteProperties();
        return $this->builder()
        ->setTableId('sparepart_shop-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->setTableAttribute('class', $this->tableClass)
        ->lengthMenu($this->lengthMenu)
        ->pageLength($this->pageLength)
        ->language($this->translateDatatables())
        ->buttons([
            $this->getCreateButton(),
            $this->getDeleteButton(),
            $this->getImportButton(),
            $this->getExportButton(),
            $this->getSearchButton(),
            $this->getCloseButton(),
            $this->getPageLengthButton()
        ])
        ->responsive(true)
        ->parameters(
            $this->initComplete('')
        );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('check')->title('<label class="skin skin-square p-0 m-0"><input data-color="red" type="checkbox" class="switchery" id="check-all" style="width: 25px"></label>')->exportable(false)->printable(false)->orderable(false)->searchable(false)->width(15)->addClass('text-center')->footer(trans('buttons.delete')),
            Column::make('id')->title('#')->width('70px'),

			Column::make('sparepart.title')->title(trans('menu.the sparepart')),
			Column::make('shope.name')->title(trans('menu.the shope')),
			Column::make('cost')->title(trans('inputs.cost')),
			Column::make('price')->title(trans('inputs.price')),
			Column::make('lowest_price')->title(trans('inputs.lowest_price')),
			Column::make('quantity')->title(trans('inputs.quantity')),
			Column::make('location')->title(trans('inputs.location')),
			Column::make('notify_limit')->title(trans('inputs.notify_limit')),
			Column::make('starting_stock')->title(trans('inputs.starting_stock')),
            Column::computed('action')->exportable(false)->printable(false)->width(75)->addClass('text-center')->footer(trans('inputs.action'))->title(trans('inputs.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return stringwithRelations
     */
    protected function filename()
    {
        return 'sparepart_shop_' . date('YmdHis');
    }

    /**
     * Overwrite trait properties.
     *
     * @return void
     */
    protected function overWriteProperties() :void
    {
        // $this->setPageLength(); // number of page length
        // $this->setLengthMenu(); // array of menu length
        // $this->setTableClass(); // string of html classes
    }
}
