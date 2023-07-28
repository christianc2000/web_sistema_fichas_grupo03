<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConsultaRequest extends FormRequest
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
            'reason' => 'required',
            'physical_exam' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'temperature' => 'required',
            'fc' => 'required',
            'pa' => 'required',
            'fr' => 'required',
            'sat' => 'required',
            'o2' => 'required',
            'details' => 'required',
        ];
    }
}
