<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'client_id' => 'required|numeric|exists:clients,id',
			'city_id' => 'required|numeric|exists:cities,id',
			'model_id' => 'required|numeric|exists:modeles,id',
			'plateNo' => 'required|string',
			'contactNo' => 'nullable|string',
			'year' => 'nullable|string',
			'color' => 'nullable|string',
			'odoMeterKm' => 'required|string',
			'vin' => 'nullable|string',
			'details' => 'nullable|string',
			
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
            'client_id' => trans('menu.clients'),
			'city_id' => trans('menu.cities'),
			'model_id' => trans('menu.modeles'),
			'plateNo' => trans('inputs.plateNo'),
			'contactNo' => trans('inputs.contactNo'),
			'year' => trans('inputs.year'),
			'color' => trans('inputs.color'),
			'odoMeterKm' => trans('inputs.odoMeterKm'),
			'vin' => trans('inputs.vin'),
			'details' => trans('inputs.details'),
			
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