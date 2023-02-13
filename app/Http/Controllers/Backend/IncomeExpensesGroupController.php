<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\IncomeExpensesGroupDataTable;
use App\Http\Controllers\BackendController;
use App\Models\IncomeExpensesGroup;
use App\Http\Services\IncomeExpensesGroupService;
use App\Http\Requests\IncomeExpensesGroupRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;


class IncomeExpensesGroupController extends BackendController
{
    public bool $full_page_ajax  = true;
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = true;
    public string $view_sub_path = '';

    public function store(IncomeExpensesGroupRequest $request, IncomeExpensesGroupService $IncomeExpensesGroupService)
    {
        $row = $IncomeExpensesGroupService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.income_expenses_group')]));
    }

    public function update(IncomeExpensesGroupRequest $request, IncomeExpensesGroupService $IncomeExpensesGroupService, $id)
    {
        $row = $IncomeExpensesGroupService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.income_expenses_group')]));
    }

    public function model() :Model { return new IncomeExpensesGroup; }

    public function dataTable() :DataTable { return new IncomeExpensesGroupDataTable; }

    public function append(): array
    {
        return [

        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
}
