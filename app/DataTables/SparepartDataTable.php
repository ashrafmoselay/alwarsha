<?php

namespace App\DataTables;

use App\Models\Sparepart;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\Traits\DatatableHelper;
use App\View\Components\PreviewImage;

class SparepartDataTable extends DataTable
{
    use DatatableHelper;

    protected $table = 'spareparts';

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
            ->filterColumn('model_id', function ($query, $keywords) {
                return $query->whereHas('model', function($query) use($keywords) {
                    return $query->where('name', 'LIKE', "%$keywords%");
                });
            })
            ->editColumn('image', function(Sparepart $row) {
                $view = new PreviewImage($row->image, $row->name);
                return $view->render()->with($view->data());
            })
            ->editColumn('model.manufacturer_id', function(Sparepart $row) { return $row->model->manufacturer?->name; })
            ->editColumn('model_id', function(Sparepart $row) { return $row->model?->name; })
            ->editColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check','image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Sparepart $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Sparepart $model)
    {
        return $model->newQuery()->filter()->with(['model']);
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
        ->setTableId('spareparts-table')
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

			Column::make('title')->title(trans('inputs.title')),
			Column::make('description')->title(trans('inputs.description')),
			Column::make('code')->title(trans('inputs.code')),
			Column::make('model.manufacturer_id')->title('الماركه'),
			Column::make('model_id')->title('الموديل'),
			Column::make('tax')->title(trans('inputs.tax')),
			Column::make('image')->title(trans('inputs.image')),
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
        return 'spareparts_' . date('YmdHis');
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
