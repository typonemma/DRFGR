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
            'cea_project' => 'required|numeric',
            'cea_svo' => 'required|numeric',
            'ci_company_name' => ['required','regex:/^[a-zA-Z0-9\s]+$/'],
            'ci_phone_company' => 'required|max:20|numeric',
            'ci_contact_person' => 'required|numeric',
            'ci_email_company' => 'required|email:dns',
            'ci_address' => ['required','regex:/^[a-zA-Z0-9\s]+$/'],
            'di_date' => 'required|date|date_format:Y-m-d',
            'di_duration' => 'required|numeric',
            'number_of_engineering' => 'required|numeric',
            'sitework_location' => ['required','regex:/^[a-zA-Z0-9\s]+$/'],
            'lodging_recomendation' => ['required','regex:/^[a-zA-Z0-9\s]+$/'],
            'scope_instrument_name' => ['required','regex:/^[a-zA-Z0-9\s]+$/'],
            'scope_model_code' => ['required','regex:/^[a-zA-Z0-9\s]+$/'],
            'post_work_document' => 'required|max:50',
            'work_type' => 'required|max:50',
            'description' => 'required',
            'gl_initial' => 'required|max:50',
            'current_work_status' => 'required|max:10',
        ];
    }
}
