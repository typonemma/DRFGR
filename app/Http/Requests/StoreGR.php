<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGR extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'for' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_telephone' => 'required|numeric',
            'contact_person' => 'required',
            'email' => 'required|email:dns',
            'description' => 'required',
            'instrumental_model' => 'required',
            'serial_number' => 'required',
            'fault_report' => 'required',
        ];
    }
}
