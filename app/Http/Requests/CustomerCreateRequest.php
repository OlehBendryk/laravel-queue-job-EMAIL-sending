<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'min:3', 'max:36'],
            'last_name' => ['required', 'string', 'min:3', 'max:36'],
            'email' => ['required', 'email', 'min:3', 'max:36'],
            'phone' => ['required', 'string', 'min:3', 'max:12'],
            'date_of_birth' => ['required', 'date'],
            'sex' => ['required', 'string' ]
        ];
    }
}
