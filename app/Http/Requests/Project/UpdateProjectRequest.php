<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:500',
            'github_link' => 'required|url|active_url',
            'demo_link' => 'required|url|active_url',
            'date' => 'required|date|after_or_equal:today',
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,svg',
        ];
    }
}
