<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFichaRequest extends FormRequest
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
            'patient_name' => 'required',
            'service_name' => 'required',
            'room_name' => 'required',
            'cost' => 'required',
            'control' => 'required',
            'doctor_id' => 'required',
        ];
    }
}
