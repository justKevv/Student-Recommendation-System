<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
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
            'description' => 'nullable|string|max:2000',
            'media' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'technologies' => 'nullable|string|max:500',
            'project_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Project title is required.',
            'title.max' => 'Project title must not exceed 255 characters.',
            'description.max' => 'Description must not exceed 2000 characters.',
            'media.image' => 'The file must be an image.',
            'media.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'media.max' => 'The image must not be larger than 2MB.',
            'technologies.max' => 'Technologies field must not exceed 500 characters.',
            'project_url.url' => 'Project URL must be a valid URL.',
            'project_url.max' => 'Project URL must not exceed 255 characters.',
            'github_url.url' => 'GitHub URL must be a valid URL.',
            'github_url.max' => 'GitHub URL must not exceed 255 characters.',
        ];
    }
}
