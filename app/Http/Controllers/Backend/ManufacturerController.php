<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ManufacturerDataTable;
use App\Exports\ManufacturersExport;
use App\Http\Controllers\BackendController;
use App\Models\Manufacturer;
use App\Http\Services\ManufacturerService;
use App\Http\Requests\ManufacturerRequest;
use App\Imports\ManufacturersImport;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Services\DataTable;


class ManufacturerController extends BackendController
{
    public bool $full_page_ajax  = true;
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = false;
    public string $view_sub_path = '';

    public function store(ManufacturerRequest $request, ManufacturerService $ManufacturerService)
    {
        $row = $ManufacturerService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.manufacturer')]));
    }

    public function update(ManufacturerRequest $request, ManufacturerService $ManufacturerService, $id)
    {
        $row = $ManufacturerService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.manufacturer')]));
    }

    public function model() :Model { return new Manufacturer; }

    public function dataTable() :DataTable { return new ManufacturerDataTable; }

    public function append(): array
    {
        return [

        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
    public function export()
    {
        return Excel::download(new ManufacturersExport, 'manufacturers.xlsx');
    }

    public function import()
    {
        return view('backend.manufacturers.import');
    }

    public function saveImport(Request $request)
    {
        Excel::import(new ManufacturersImport, $request->file);
        return response()->json(['message' => "Data Saved Successfully!", 'icon' => 'success']);
    }
}
