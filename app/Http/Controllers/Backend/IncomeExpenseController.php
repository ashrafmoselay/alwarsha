<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\IncomeExpenseDataTable;
use App\Http\Controllers\BackendController;
use App\Models\IncomeExpense;
use App\Http\Services\IncomeExpenseService;
use App\Http\Requests\IncomeExpenseRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;


class IncomeExpenseController extends BackendController
{
    public bool $full_page_ajax  = false;
    public bool $use_form_ajax   = true;
    public bool $use_button_ajax = true;
    public string $view_sub_path = '';

    public function store(IncomeExpenseRequest $request, IncomeExpenseService $IncomeExpenseService)
    {
        $row = $IncomeExpenseService->handle($request->validated());
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row created', ['model' => trans('menu.income_expense')]));
    }

    public function update(IncomeExpenseRequest $request, IncomeExpenseService $IncomeExpenseService, $id)
    {
        $row = $IncomeExpenseService->handle($request->validated(), $id);
        if ($row instanceof Exception ) throw new Exception( $row );
        return $this->redirect(trans('flash.row updated', ['model' => trans('menu.income_expense')]));
    }

    public function model() :Model { return new IncomeExpense; }

    public function dataTable() :DataTable { return new IncomeExpenseDataTable; }

    public function append(): array
    {
        return [

			'groups' => \App\Models\IncomeExpensesGroup::pluck('name', 'id'),
			'shopes' => \App\Models\Shope::pluck('name', 'id'),
        ];
    }

    public function query($id) :object|null
    {
        return $this->model()::find($id);
    }
}
