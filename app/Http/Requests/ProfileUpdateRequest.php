<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function wauthorize(): bool
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' .$this->user()->id,
            'phone' => 'required|string|max:20|regex:/^[0-9()+\-.\s]+$/',
            'birthday' => 'nullable|date|before:today',
            'ImageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
        // return [
        //     'firstName' => 'required|string|max:255|regex:/^[\pL\pM\s]+$/u',
        //     'lastName' => 'required|string|max:255|regex:/^[\pL\pM\s]+$/u',
        //     'email' => 'required|email|max:255|unique:users,email,' . $this->user()->id,
        //     'phone' => 'nullable|string|max:20|regex:/^[0-9()+\-.\s]+$/',
        //     'birthday' => 'nullable|date|before:today',
        //     // 'ImageUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image
        // ];
    }
}
