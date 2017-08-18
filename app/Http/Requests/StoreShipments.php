<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipments extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'shipment_type' => 'required|numeric',
            'shipment_line' => 'required|numeric',
            'plate' => 'required|alpha_num|min:7|max:7',
            'container_number' => 'required|string|min:6|max:20',
            'responsible_name' => 'required|string|max:50',
            'comments' => 'nullable|string|max:150',
            'entry' => 'nullable|date',
            'departure' => 'nullable|date'
        ];
    }
}
