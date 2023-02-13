<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SparepartShopRequest extends FormRequest
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
            'sparepart_id' => 'required|numeric|exists:spareparts,id',
			'shope_id' => 'required|numeric|exists:shopes,id',
			'cost' => 'required|string',
			'price' => 'required|string',
			'lowest_price' => 'required|string',
			'quantity' => 'required|string',
			'location' => 'nullable|string',
			'notify_limit' => 'required|string',
			'starting_stock' => 'required|string',
			
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
            'sparepart_id' => trans('menu.spareparts'),
			'shope_id' => trans('menu.shopes'),
			'cost' => trans('inputs.cost'),
			'price' => trans('inputs.price'),
			'lowest_price' => trans('inputs.lowest_price'),
			'quantity' => trans('inputs.quantity'),
			'location' => trans('inputs.location'),
			'notify_limit' => trans('inputs.notify_limit'),
			'starting_stock' => trans('inputs.starting_stock'),
			
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