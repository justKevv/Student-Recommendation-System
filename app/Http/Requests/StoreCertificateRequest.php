<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCertificateRequest extends FormRequest
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
            'certificate_name' => 'required|string|max:255',
            'issuing_organization' => 'required|string|max:255',
            'issue_date' => 'required|date',
            'description' => 'nullable|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate_url' => 'nullable|url|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'certificate_name.required' => 'Certificate name is required.',
            'certificate_name.max' => 'Certificate name must not exceed 255 characters.',
            'issuing_organization.required' => 'Issuing organization is required.',
            'issuing_organization.max' => 'Issuing organization must not exceed 255 characters.',
            'issue_date.required' => 'Issue date is required.',
            'issue_date.date' => 'Issue date must be a valid date.',
            'description.max' => 'Description must not exceed 1000 characters.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image must not be larger than 2MB.',
            'certificate_url.url' => 'Certificate URL must be a valid URL.',
            'certificate_url.max' => 'Certificate URL must not exceed 255 characters.',
        ];
    }
}
