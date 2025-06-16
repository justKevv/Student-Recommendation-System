<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'company' => 'required|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,contract,internship,freelance',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_currently_working_here' => 'boolean',
            'description' => 'nullable|string|max:5000',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_currently_working_here' => $this->boolean('is_currently_working_here'),
        ]);

        // If currently working, clear end_date
        if ($this->boolean('is_currently_working_here')) {
            $this->merge(['end_date' => null]);
        }
    }
}
