<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name'       => ['sometimes', 'string', 'min:3', 'max:160'],
            'description' => ['sometimes', 'string', 'min:3'],
            'priority'    => ['sometimes', Rule::in(['low', 'medium', 'high'])],
            'due_date'    => ['sometimes', 'nullable', 'date', 'after_or_equal:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.string'   => 'The name must be text.',
            'name.min'      => 'The name must be at least :min characters.',
            'name.max'      => 'The name may not be greater than :max characters.',

            'description.string'   => 'The description must be text.',
            'description.min'      => 'The description must be at least :min characters.',

            'priority.in'       => 'Priority must be one of: low, medium, or high.',

            'due_date.date' => 'Due date must be a valid date.',
            'due_date.after_or_equal' => 'Due date cannot be in the past.'
        ];
    }
}
