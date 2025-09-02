<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreIssueRequest extends FormRequest
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
            'title'       => ['required', 'string', 'min:3', 'max:160'],
            'description' => ['required', 'string', 'min:3'],
            'priority'    => ['required', Rule::in(['low', 'medium', 'high'])],
            'due_date'    => ['nullable', 'date', 'after_or_equal:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'project_id.required' => 'Please choose the project this issue belongs to.',
            'project_id.exists'   => 'The selected project does not exist.',

            'title.required' => 'A title is required.',
            'title.string'   => 'The title must be text.',
            'title.min'      => 'The title must be at least :min characters.',
            'title.max'      => 'The title may not be greater than :max characters.',

            'description.required' => 'Please provide a description.',
            'description.string'   => 'The description must be text.',
            'description.min'      => 'The description must be at least :min characters.',

            'priority.required' => 'Please set a priority.',
            'priority.in'       => 'Priority must be one of: low, medium, or high.',

            'due_date.date' => 'Due date must be a valid date.',
            'due_date.after_or_equal' => 'Due date cannot be in the past.'
        ];
    }

}
