<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipments extends FormRequest
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
            'shipment_type' => 'numeric',
            'shipment_line' => 'numeric',
            'plate' => 'alpha_num|min:7|max:7',
            'container_number' => 'string|min:6|max:20',
            'responsible_name' => 'string|max:50',
            'comments' => 'nullable|string|max:150',
            'entry' => 'nullable|date',
            'departure' => 'nullable|date'
        ];
    }
}
