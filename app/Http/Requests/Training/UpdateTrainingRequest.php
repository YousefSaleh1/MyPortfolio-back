<?php

namespace App\Http\Requests\Training;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTrainingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'training_name'=>'required',
            'company_name'=>'required',
            'description'=>'required',
             'company_logo'=>'required',
            'company_link'=>'required',
            'certificate_link'=>'required',
            'recomendation_letter_link'=>'required',  
              ];
    }
}
