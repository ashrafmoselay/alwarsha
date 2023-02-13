<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'transaction_date' => 'required|date',
			'shope_id' => 'required|numeric|exists:shopes,id',
			'group_id' => 'required|numeric|exists:income_expenses_groups,id',
			'title' => 'required|string',
            'type'=>'required|string',
			'comments' => 'nullable|string',
			'amount' => 'required|string',
			'vat_value' => 'required|string',

        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'transaction_date' => trans('inputs.transaction_date'),
			'shope_id' => trans('menu.shopes'),
			'group_id' => trans('menu.income_expenses_groups'),
			'title' => trans('inputs.title'),
			'comments' => trans('inputs.comments'),
			'amount' => trans('inputs.amount'),
			'vat_value' => trans('inputs.vat_value'),

        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        //
    }
}
