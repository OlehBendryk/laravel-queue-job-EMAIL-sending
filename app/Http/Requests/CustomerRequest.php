<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'min:3', 'max:64'],
            'last_name' => ['required', 'string', 'min:3', 'max:64'],
            'phone' => ['required', 'string', 'min:3', 'max:64'],
            'date_of_birth' => ['required', 'date'],
            'sex' => ['required', ],
        ];
    }
}
