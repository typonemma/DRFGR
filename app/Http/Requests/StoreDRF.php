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
            'cc' => 'required|max:20',
            'cea_project' => 'required|numeric',
            'cea_svo' => 'required|numeric',
            'ci_company_name' => 'required|alpha_num_spaces',
            'ci_phone_company' => 'required|max:20|numeric',
            'ci_contact_person' => 'required|numeric',
            'ci_email_company' => 'required|email:dns',
            'ci_address' => 'required|alpha_num_spaces',
            'number_of_engineering' => 'required|numeric',
            'sitework_location' => 'required|alpha_num_spaces',
            'lodging_recomendation' => 'required|alpha_spaces',
            'scope_instrument_name' => 'required|alpha_num_spaces',
            'scope_model_code' => 'required|alpha_num_spaces',
            'post_work_document' => 'required|max:50',
            'work_type' => 'required|max:50',
            'desc' => 'required',
            'gl_initial' => 'required|max:50',
            'engineer_signed_1' => 'required|max:255',
            'engineer_signed_2' => 'required|max:255',
            'current_work_status' => 'required|max:10',
        ];
    }
}
