<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SparepartDataTable;
use App\Exports\SparepartsExport;
use App\Http\Controllers\BackendController;
use App\Models\Sparepart;
use App\Http\Services\SparepartService;
use App\Http\Requests\SparepartRequest;
use App\Imports\SparepartsImport;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Services\DataTable;


class SparepartController extends BackendController
{
    public bool $full_page_ajax  = false;
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = true;
    public string $view_sub_path = '';

    public function store(SparepartRequest $request, SparepartService $SparepartService)
    {
        $row = $SparepartService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.sparepart')]));
    }

    public function update(SparepartRequest $request, SparepartService $SparepartService, $id)
    {
        $row = $SparepartService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.sparepart')]));
    }

    public function model() :Model { return new Sparepart; }

    public function dataTable() :DataTable { return new SparepartDataTable; }

    public function append(): array
    {
        return [

			'models' => \App\Models\Modele::pluck('name', 'id'),
        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
    public function export()
    {
        return Excel::download(new SparepartsExport , 'spareparts.xlsx');
    }

    public function import()
    {
        return view('backend.spareparts.import');
    }

    public function saveImport(Request $request)
    {
        Excel::import(new SparepartsImport, $request->file);
        return response()->json(['message' => "Data Saved Successfully!", 'icon' => 'success']);
    }
}
