<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServiceDataTable;
use App\Http\Controllers\BackendController;
use App\Models\Service;
use App\Http\Services\ServiceService;
use App\Http\Requests\ServiceRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;


class ServiceController extends BackendController
{
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = true;

    public function store(ServiceRequest $request, ServiceService $ServiceService)
    {
        $row = $ServiceService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.service')]));
    }

    public function update(ServiceRequest $request, ServiceService $ServiceService, $id)
    {
        $row = $ServiceService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.service')]));
    }

    public function model() :Model { return new Service; }

    public function dataTable() :DataTable { return new ServiceDataTable; }

    public function append(): array
    {
        return [

			'departments' => \App\Models\Department::pluck('title', 'id'),
        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
}
