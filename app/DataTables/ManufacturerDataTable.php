<?php

namespace App\DataTables;

use App\Models\Manufacturer;
use App\View\Components\ToggleColumn;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\Traits\DatatableHelper;

class ManufacturerDataTable extends DataTable
{
    use DatatableHelper;

    protected $table = 'manufacturers';

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
            ->editColumn('active', function(Manufacturer $row) {
                $view = new ToggleColumn($row->id, 'active', $row->active);
                return $view->render()->with($view->data());
            })
            ->editColumn('name', function(Manufacturer $row) {
                $text = '<ul>';
                foreach ($row->getTranslations()['name'] as $name)
                    $text .= "<li>$name</li>";
                return "$text </ul>";
            })
            ->addColumn('check', 'backend.includes.tables.checkbox')
            ->editColumn('action', 'backend.includes.buttons.table-buttons')
            ->rawColumns(['action', 'check', 'name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Manufacturer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Manufacturer $model)
    {
        return $model->newQuery()->filter();
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
        ->setTableId('manufacturers-table')
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

			Column::make('name')->title(trans('inputs.name')),
			Column::make('active')->title(trans('inputs.active')),
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
        return 'manufacturers_' . date('YmdHis');
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
