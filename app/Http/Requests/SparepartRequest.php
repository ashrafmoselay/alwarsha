<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparepartRequest extends FormRequest
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
			'code' => 'required|string|unique:spareparts,code,'.request()->sparepart.'',
			'model_id' => 'required|numeric|exists:modeles,id',
			'tax' => 'required|string',
			'image' => 'nullable|image|mimes:png,jpg,jpeg',
			'deleted_at' => 'nullable|date',
			
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
			'code' => trans('inputs.code'),
			'model_id' => trans('menu.modeles'),
			'tax' => trans('inputs.tax'),
			'image' => trans('inputs.image'),
			'deleted_at' => trans('inputs.deleted_at'),
			
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