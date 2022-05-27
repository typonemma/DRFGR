<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDRF extends FormRequest
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
            // 'to' => 'required',
            'cc' => 'required|max:20',
            'cea_project' => 'required|alpha_num',
            'cea_svo' => 'required|numeric',
            'ci_company_name' => 'required',
            'ci_phone_company' => 'required|numeric|digits_between:10,15',
            'ci_contact_person' => 'required|numeric',
            'ci_email_company' => 'required|email:dns',
            'ci_address' => 'required',
            'di_date' => 'required|date_format:Y-m-d',
            'di_duration' => 'required|numeric',
            'number_of_engineering' => 'required|numeric',
            'sitework_location' => 'required',
            'lodging_recomendation' => 'required',
            'scope_instrument_name' => 'required',
            'scope_model_code' => 'required',
            'post_work_document' => 'required|max:50',
            'work_type' => 'required|max:50',
            'description' => 'required',
            'dokumen_pendukung' => 'required|mimes:pdf,doc,docx|max:5120',
        ];
    }
}
