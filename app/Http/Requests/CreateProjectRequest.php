<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:150',
                'regex:/\S/',                       
            ],
            'description' => [
                'required',
                'string',
                'min:10',
                'max:5000',
            ],
            'deadline' => [
                'required',
                'date',                        
                'after:today',                 
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Give your project a name.',
            'name.string'   => 'Project name must be text.',
            'name.min'      => 'Project name must be at least 3 characters.',
            'name.max'      => 'Project name must not exceed 150 characters.',
            'name.regex'    => 'Project name cant be only whitespace.',

            'description.string'    => 'Description must be text.',
            'description.min'       => 'Description should be at least 10 characters.',
            'description.max'       => 'Description may not be longer than 5000 characters.',

            'deadline.required'     => 'Please choose a deadline.',
            'deadline.date'         => 'Deadline must be a valid date.',
            'deadline.after'        => 'Deadline must be a future date.',
        ];
    }
}
