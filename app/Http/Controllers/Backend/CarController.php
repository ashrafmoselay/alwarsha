<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CarDataTable;
use App\Http\Controllers\BackendController;
use App\Models\Car;
use App\Http\Services\CarService;
use App\Http\Requests\CarRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;


class CarController extends BackendController
{
    public bool $full_page_ajax  = false;
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = true;
    public string $view_sub_path = '';

    public function store(CarRequest $request, CarService $CarService)
    {
        $row = $CarService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.car')]));
    }

    public function update(CarRequest $request, CarService $CarService, $id)
    {
        $row = $CarService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.car')]));
    }

    public function model() :Model { return new Car; }

    public function dataTable() :DataTable { return new CarDataTable; }

    public function append(): array
    {
        return [

			'cities' => \App\Models\City::pluck('name', 'id'),
			'clients' => \App\Models\Client::pluck('username', 'id'),
			'models' => \App\Models\Modele::pluck('name', 'id'),
        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
}
