<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIVSP extends FormRequest
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
            'for' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'customer_telephone' => 'required|numeric',
            'contact_person' => 'required',
            'in_date' => 'required|date_format:Y-m-d',
            'desc' => 'required',
            'fault_report' => 'required',
            'serial_number' => 'required',
            'instrument_model' => 'required'
        ];
    }
}
