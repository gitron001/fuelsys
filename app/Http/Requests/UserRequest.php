<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
          'rfid'  => 'required',
          'name'  => 'required',
          'type'  => 'required',

        ];
    }

    public function messages()
    {
        return [
            'rfid.required'   => 'The rfid field is required !',
            'name.required'   => 'The name field is required !',
            'type.required'   => 'The type field is required !',
        ];
    }
}
