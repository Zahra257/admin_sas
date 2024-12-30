<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Change this if you have authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('id');
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('accounts', 'name')->ignore($id)
            ],
            'organisationId' => 'exists:organisations,id',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('accounts', 'email')->ignore($id)
            ],
            'secondary_email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('accounts', 'secondary_email')->ignore($id)
            ],
            'phone' => 'required|string|max:20',
            'secondary_phone' => 'nullable|string|max:20',
            'website' => 'required|url|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'segment' => 'required|in:Bronze,Silver,Gold,VIP',
            'tax_id_1' => 'required|string|max:50',
            'tax_id_2' => 'required|string|max:50',
            'tax_id_3' => 'required|string|max:50',
            'tax_id_4' => 'required|string|max:50',
            'tax_id_5' => 'required|string|max:50',
            'tax_id_6' => 'nullable|string|max:50',
            'active' => 'nullable'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'organisationId.required' => 'The organisation field is required.',
            'organisationId.exists' => 'The selected organisation is invalid.',
            'email.required' => 'The main email field is required.',
            'email.email' => 'The main email must be a valid email address.',
            'secondary_email.email' => 'The secondary email must be a valid email address.',
            'phone.required' => 'The main phone field is required.',
            'website.url' => 'The website must be a valid URL.',
            'segment.required' => 'The segment field is required.',
            'segment.in' => 'The selected segment is invalid.',
            'active.required' => 'The active field is required.',
            'active.boolean' => 'The active field must be true or false.'
        ];
    }
}
