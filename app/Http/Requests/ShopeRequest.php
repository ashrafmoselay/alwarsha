<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopeRequest extends FormRequest
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
            'name' => 'required|string',
			'contact_person' => 'nullable|string',
			'contact_no' => 'nullable|string',
			'email' => 'nullable|string',
			'license_no' => 'nullable|string',
			'vat_number' => 'nullable|string',
			'address' => 'nullable|string',
			'logo' => 'nullable|image|mimes:png,jpg,jpeg',
			'seal' => 'nullable|image|mimes:png,jpg,jpeg',
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
            'name' => trans('inputs.name'),
			'contact_person' => trans('inputs.contact_person'),
			'contact_no' => trans('inputs.contact_no'),
			'email' => trans('inputs.email'),
			'license_no' => trans('inputs.license_no'),
			'vat_number' => trans('inputs.vat_number'),
			'address' => trans('inputs.address'),
			'logo' => trans('inputs.logo'),
			'seal' => trans('inputs.seal'),
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