<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
          'name'        => 'required',
          'bis_number'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'The name field is required !',
            'bis_number.required'   => 'The bis number field is required !',
        ];
    }
}
