<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'title' => 'required|string',
			'description' => 'nullable|string',
			'durationPeriodValue' => 'required|string',
			'durationPeriodType' => 'required|string',
			'warrantyPeriodValue' => 'nullable|string',
			'warrantyPeriodType' => 'required|string',
            'service_price'=>'required|numeric',
            'min_price'=>'required|numeric',
			'active' => 'nullable|boolean',
			'allowPriceChangeInTicket' => 'nullable|boolean',
			'department_id' => 'required|numeric|exists:departments,id',

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
            'title' => trans('inputs.title'),
			'description' => trans('inputs.description'),
			'durationPeriodValue' => trans('inputs.durationPeriodValue'),
			'durationPeriodType' => trans('inputs.durationPeriodType'),
			'warrantyPeriodValue' => trans('inputs.warrantyPeriodValue'),
			'warrantyPeriodType' => trans('inputs.warrantyPeriodType'),
			'active' => trans('inputs.active'),
			'allowPriceChangeInTicket' => trans('inputs.allowPriceChangeInTicket'),
			'department_id' => trans('menu.departments'),

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
