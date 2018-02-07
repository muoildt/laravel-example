<?php

namespace App\Http\Requests\members;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequestsMemberRequests extends FormRequest
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
        switch ($this->colum) {
            case 'first_name':
                return [
                    'val'  => 'required|string',
                ];
                break;
            case 'surname':
                return [
                    'val'  => 'required|string',
                ];
                break;
            case 'email':
                return [
                    'val'  => 'required|string|email',
                ];
                break;
            default:
                break;
        }
    }
}
