<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route('id');
        $rules = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id)
            ],
            'password' => 'nullable|string|min:8|max:255', // Password is nullable for update
            'role' => 'required|string|in:super_admin,admin,user,operator',
            'organisationId' => 'nullable|exists:organisations,id',
            'account_id ' => 'nullable|exists:accounts,id',            'active' => 'sometimes',
            'phone' => 'required|numeric',
            'birthday' => 'required|date',
        ];
    
        // Add required rule for password only in the create form
        if ($this->isMethod('POST')) {
            $rules['password'] = 'required|string|min:8|max:255';
        }
    
        return $rules;
    }
}
