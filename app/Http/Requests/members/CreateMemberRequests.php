<?php

namespace App\Http\Requests\members;

use Illuminate\Foundation\Http\FormRequest;

class CreateMemberRequests extends FormRequest
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
            'first_name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|string|email',
        ];

    }
    public function messages()
    {
        return [
            'email.email' => 'Please enter a valid email address',
            'email.required' => 'Email address is required',
            'email.string' => 'Email address is required',
            'first_name.required' => 'First name address is required',
            'first_name.string' => 'First name address is required',
            'surname.required' => 'Surname address is required',
            'surname.string' => 'Surname address is required',
            
        ];
    }
}
