<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHistorialRequest extends FormRequest
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
            'age' => 'required',
            'gender' => 'required',
            'occupation' => 'required',
            'birth_date' => 'required',
            'number_phone' => 'required',
            'current_residence' => 'required',
            'degree_study' => 'required',
            'reason' => 'required',
            'disease_history' => 'required',
            'general_physical_examination' => 'required',
            'pathological_history' => 'required',
            'observations' => 'required',
            'diagnostic_impression' => 'required',
            'supplementary_exam' => 'required',
            'behavior_and_treatment' => 'required',
            'patient_id' => 'required',
        ];
    }
}
