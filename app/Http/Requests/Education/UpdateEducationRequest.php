<?php

namespace App\Http\Requests\Education;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
        return[
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'photo'       => 'nullable|image|mimes:png,jpg,jpeg,gif,sug|max:2048',
        ];
    }
}
