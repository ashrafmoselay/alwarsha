<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SparepartShopDataTable;
use App\Exports\SparepartsShopExport;
use App\Http\Controllers\BackendController;
use App\Models\SparepartShop;
use App\Http\Services\SparepartShopService;
use App\Http\Requests\SparepartShopRequest;
use App\Imports\SparepartsShopImport;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Services\DataTable;


class SparepartShopController extends BackendController
{
    public bool $full_page_ajax  = false;
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = true;
    public string $view_sub_path = '';

    public function store(SparepartShopRequest $request, SparepartShopService $SparepartShopService)
    {
        $row = $SparepartShopService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.sparepart_shop')]));
    }

    public function update(SparepartShopRequest $request, SparepartShopService $SparepartShopService, $id)
    {
        $row = $SparepartShopService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.sparepart_shop')]));
    }

    public function model() :Model { return new SparepartShop; }

    public function dataTable() :DataTable { return new SparepartShopDataTable; }

    public function append(): array
    {
        return [

			'shopes' => \App\Models\Shope::pluck('name', 'id'),
			'spareparts' => \App\Models\Sparepart::pluck('title', 'id'),
        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
    public function export()
    {
        return Excel::download(new SparepartsShopExport , 'sparepartsShop.xlsx');
    }

    public function import()
    {
        return view('backend.sparepart_shop.import');
    }

    public function saveImport(Request $request)
    {
        Excel::import(new SparepartsShopImport, $request->file);
        return response()->json(['message' => "Data Saved Successfully!", 'icon' => 'success']);
    }
}
