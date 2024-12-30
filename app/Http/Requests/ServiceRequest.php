<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after:starting_date',
            'expired' => 'nullable',
            'description' => 'required|string',
            'organisationId' => 'exists:organisations,id',
            'account_id' => 'required|exists:accounts,id',
        ];
    }
}
