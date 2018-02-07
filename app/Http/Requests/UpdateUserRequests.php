<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequests extends FormRequest
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
        switch ($this->name) {
            case 'name':
                return [
                    'value'     => 'required|min:3|max:20|',
                ];
                break;
            case 'email':
                return [
                    'value'     => 'required|min:5|email|unique:users,email,'.$this->pk,
                ];
                break;
            case 'role':
                return [
                    'value'     => 'required|numeric',
                ];
                break;
            default:
                break;
        }

    }
}
