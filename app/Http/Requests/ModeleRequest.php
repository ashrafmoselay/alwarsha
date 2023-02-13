<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeleRequest extends FormRequest
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
            'manufacturer_id' => 'required|numeric|exists:manufacturers,id',
			'name.en' => 'required|string',
			'name.ar' => 'required|string',
			'active' => 'nullable|boolean',
			
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
            'manufacturer_id' => trans('menu.manufacturers'),
			'name.en' => trans('inputs.name'),
			'name.ar' => trans('inputs.name'),
			'active' => trans('inputs.active'),
			
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